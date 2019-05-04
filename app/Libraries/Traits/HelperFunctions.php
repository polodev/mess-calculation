<?php

namespace App\Libraries\Traits;

use App\Meal;
use Carbon\Carbon;



trait HelperFunctions {
	
	/**
	 * generate fake meal data 
	 * for seeding data
	 */

	public static function meals()
	{
		$meals = [];
		foreach (range(1, 10) as $day) {
			$mutable = Carbon::now()->add($day, 'day');

			foreach (range(1, 4) as $user_id) {
				$meals[] = [
					'user_id' => $user_id,
					'date' => $mutable->toDateString(),
					'number_of_meal' => 2,
				];
			}
		}
		return $meals;
	}

	/**
	 * get a meal by carbon date and user_id
	 */
	public static function get_meal($user_id, $date, $day) 
	{
		$month = $date->month;
		$year = $date->year;
		$meal = Meal::whereYear('date', $year)
							->whereMonth('date', $month)
							->whereDay('date', $day)->first();
		if ($meal) {
			return $meal->number_of_meal;
		}else {
			return 0;
		}
	}

}
