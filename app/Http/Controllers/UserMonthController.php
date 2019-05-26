<?php

namespace App\Http\Controllers;

use App\Libraries\Helpers;
use App\User;
use App\UserMonth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserMonthController extends Controller
{
  protected function get_user_names($ids = []) {
    $users =  User::whereIn('id', $ids)->pluck('name')->toArray();
    return implode(', ', $users);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $user_months_data = [];
    $user_months = UserMonth::get();
    foreach ($user_months as $single_month) {
      $user_ids = json_decode( $single_month->user_ids );
      $users = $this->get_user_names($user_ids);
      $single_data = [];
      $single_data['user_month'] = $single_month;
      $single_data['users'] = $users;
      $user_months_data[] = $single_data;
    }
    $user_months_data = collect($user_months_data);
    return view('user_month.index', compact('user_months_data'));
     //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    return view('user_month.create', compact('users'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $year_month = Helpers::generating_year_month( request( 'year_month' ) );
    $user_ids      = request('user_ids');
    $data = [
      'year_month' => $year_month,
      'user_ids'   => $user_ids,
    ];
    return $data;
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
