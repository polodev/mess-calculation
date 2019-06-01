<?php

namespace App\Http\Controllers;

use App\Debitcredit;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DebitCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $year_month = Carbon::now();
      if (request('timeline')) {
        $timeline = Carbon::parse(request('timeline'));
        $timeline = $timeline->add(5, 'day');
        $year_month = $timeline;
      }
      $user = auth()->user();
      $debits  =  Debitcredit::where('debit_to', $user->id)->FilterYearMonth($year_month)->get();
      $credits =  Debitcredit::where('credit_to', $user->id)->FilterYearMonth($year_month)->get();
      $debits_total = $debits->sum('amount');
      $credits_total = $credits->sum('amount');
      $data = compact(
        'user',
        'debits',
        'credits',
        'debits_total',
        'year_month',
        'credits_total'
      );
      return view( 'debit_credit.index', $data );
    }

    public function index_all()
    {
      $year_month = Carbon::now();
      if (request('timeline')) {
        $timeline = Carbon::parse(request('timeline'));
        $timeline = $timeline->add(5, 'day');
        $year_month = $timeline;
      }
      $debit_credits  =  Debitcredit::FilterYearMonth($year_month)->get();
      // return $debit_credits;
      return view( 'debit_credit.index_all', compact( 'debit_credits', 'year_month' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::where('id', '<>', auth()->id())->get();
      return view('debit_credit.create', compact( 'users' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'date'    => 'required',
        'amount'  => 'required',
        'user_id' => 'required',
      ]);

      Debitcredit::create([
        'date'      => Carbon::parse(request('date')),
        'credit_to' => auth()->id(),
        'debit_to'  => request('user_id'),
        'amount'    => request('amount'),
        'more_info' => request('more_info'),
      ]);
      return back()->withMessage('Deposit information Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $debit_credit = Debitcredit::findOrFail($id);
      return view( 'debit_credit.show', compact( 'debit_credit' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::where('id', '<>', auth()->id())->get();
      $debit_credit = Debitcredit::findOrFail($id);
      return view('debit_credit.edit', compact( 'users', 'debit_credit' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'date'    => 'required',
        'amount'  => 'required',
        'user_id' => 'required',
      ]);

      $debit_credit = Debitcredit::findOrFail($id);
      $debit_credit->date = Carbon::parse(request('date'));
      $debit_credit->debit_to = request('user_id');
      $debit_credit->amount = request('amount');
      $debit_credit->more_info = request('more_info');
      $debit_credit->save();

      return back()->withMessage('Deposit information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $debit_credit =  Debitcredit::find($id);
        $debit_credit->delete();
        return back()->withMessage('Entry deleted successfully');
    }
  }
