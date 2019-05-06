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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  }
