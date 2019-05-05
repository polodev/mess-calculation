<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BazarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $year_month = Carbon::now();
      if (request('timeline')) {
        $timeline = Carbon::parse(request('timeline'));
        $timeline = $timeline->add(5, 'day');
        $year_month = $timeline;
      }
      $year = $year_month->year;
      $month = $year_month->month;
      $bazars = Bazar::whereYear('date', $year)->whereMonth('date', $month)->paginate( 30 );
      return view( 'bazar.index', compact( 'bazars', 'year_month') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      return view('bazar.create', compact('users'));    }

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
        'type'    => 'required',
        'cost'    => 'required'
      ]);

      $user_id        = request('user_id');
      $auth_user = auth()->user();
      if ($auth_user->isAdmin() || !$user_id) {
        $user_id = $auth_user->id;
      }

      Bazar::create([
        'date'      => Carbon::parse(request('date')),
        'user_id'   => $user_id,
        'type'      => request('type'),
        'cost'      => request('cost'),
        'more_info' => request('more_info'),
      ]);
      return back()->withMessage('Bazar Added Successfully');
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
      $users = User::all();
      $bazar = Bazar::findOrFail($id);
      return view('bazar.edit', compact('users', 'bazar') );
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
        'type'    => 'required',
        'cost'    => 'required'
      ]);

      $user_id        = request('user_id');
      $auth_user = auth()->user();
      if ($auth_user->isAdmin() || !$user_id) {
        $user_id = $auth_user->id;
      }
      $bazar            = Bazar::findOrFail($id);
      $bazar->date      = Carbon::parse(request('date'));
      $bazar->user_id   = $user_id;
      $bazar->type      = request('type');
      $bazar->cost      = request('cost');
      $bazar->more_info = request('more_info');
      $bazar->save();

      return back()->withMessage('Bazar Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bazar = Bazar::findOrFail($id);
      $bazar->delete();
      return back()->withMessage('Bazar Deleted Successfully');
    }
  }
