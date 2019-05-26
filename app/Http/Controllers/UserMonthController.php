<?php

namespace App\Http\Controllers;

use App\User;
use App\UserMonth;
use Illuminate\Http\Request;

class UserMonthController extends Controller
{
  protected function get_users($ids = []) {
    return User::whereIn('id', $ids)->get();
  }
  public function index()
  {
    $user_months_data = [];
    $user_months = UserMonth::latest()->get();
    foreach ($user_months as $single_month) {
      $user_ids = json_decode( $single_month->user_ids );
      $users = $this->get_users($user_ids);
      $single_data = [];
      $single_data['year_month'] = $single_month->year_month;
      $single_data['user_ids'] = $user_ids;
      $single_data['users'] = $users;
      $user_months_data[] = $single_data;
    }
    $user_months_data = collect($user_months_data);
    return $user_months_data;
  }
}
