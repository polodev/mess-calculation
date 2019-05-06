<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\Debitcredit;
use App\Meal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{

	public function index() 
	{
		 $year_month = Carbon::now();
      if (request('timeline')) {
        $timeline   = Carbon::parse(request('timeline'));
        $timeline   = $timeline->add(5, 'day');
        $year_month = $timeline;
      }

      $regular_bazars_cost  = Bazar::FilterYearMonth($year_month)
                               ->where('type', 'regular')
                                ->sum('cost');
      $common_bazars_cost   = Bazar::FilterYearMonth($year_month)
                               ->where('type', 'common')
                                ->sum('cost');
      $others_bazars_cost   = Bazar::FilterYearMonth($year_month)
                             ->where('type', 'others')
                              ->sum('cost');
      $total_meal           = Meal::FilterYearMonth($year_month)->sum('number_of_meal');
      $users                = User::where('enable', 1)->get();

      //  I don't know why heroku giving me error
      $per_meal_cost        = 0;
      $common_cost_per_user = 0;
      $others_cost_per_user = 0;
      if ($regular_bazars_cost > 5) {
        $per_meal_cost        = $regular_bazars_cost / $total_meal;
      }
      if ($common_bazars_cost > 5) {
        $common_cost_per_user = $common_bazars_cost / count( $users );
      }
      if ($others_bazars_cost > 5) {
        $others_cost_per_user = $others_bazars_cost / count( $users ) ;
      }

      // $per_meal_cost        = number_format( $per_meal_cost, 2 );
      // $common_cost_per_user        = number_format( $common_cost_per_user, 2 );
      // $others_cost_per_user        = number_format( $others_cost_per_user, 2 );

     	$costs = [];
     	foreach ($users as $user) {
     		$user_data                    = [];
	      $user_number_of_meal          = Meal::FilterYearMonth($year_month)
	      										         		->where('user_id', $user->id)
	      										         		->sum('number_of_meal');
	      $user_meal_cost               = $user_number_of_meal * $per_meal_cost ;
	      $user_total_cost              = $user_meal_cost + $common_cost_per_user + $others_cost_per_user;
	      $user_bazar                   = Bazar::FilterYearMonth($year_month)
	      								              	 ->where('user_id', $user->id)
                                         ->sum('cost');
        $debits                       =  Debitcredit::where('debit_to', $user->id)->FilterYearMonth($year_month)->sum('amount');
        $credits                      =  Debitcredit::where('credit_to', $user->id)->FilterYearMonth($year_month)->sum('amount');
        $balance                      = $credits - $debits;
        $user_get_or_due              = $user_bazar + $balance - $user_total_cost;
	      $user_data['user']            = $user;
        $user_data['balance']         = $balance;
	      $user_data['bazar']           = $user_bazar;
	      $user_data['number_of_meal']  = $user_number_of_meal;
	      $user_data['meal_cost']       = $user_meal_cost;
	      $user_data['total_cost']      = $user_total_cost;
	      $user_data['get_or_due']      = $user_get_or_due;
	      $costs[]                      = $user_data;
     	}

     	$final_data = compact(
     		'year_month',
     		'regular_bazars_cost',
     		'common_bazars_cost',
     		'others_bazars_cost',
     		'total_meal',
     		'users',
     		'per_meal_cost',
     		'common_cost_per_user',
     		'others_cost_per_user',
     		'others_cost_per_user',
     		'costs'
     	);

		return view('index', $final_data);
	}
}
