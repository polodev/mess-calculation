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
      $bazars = Bazar::paginate( 30 );
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
        'user_id' => 'required',
        'type'    => 'required',
        'cost'    => 'required'
      ]);
      Bazar::create([
        'date'    => Carbon::parse(request('date')),
        'user_id' => request('user_id'),
        'type'    => request('type'),
        'cost'    => request('cost'),
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
