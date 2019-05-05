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
		foreach (range(0, 12) as $day) {
			$mutable = Carbon::now()->sub($day, 'day');

			foreach (range(1, 4) as $user_id) {
				$meals[] = [
					'user_id' => $user_id,
					'date' => $mutable->toDateString(),
					'number_of_meal' => rand(1, 2),
				];
			}
		}
		return $meals;
	}

	/**
	 * get a single date meal by carbon date and user_id
	 */
	public static function get_meal($user_id, $year_month, $day) 
	{
		$month = $year_month->month;
		$year = $year_month->year;
		$meal = Meal::where('user_id', $user_id)
							->whereYear('date', $year)
							->whereMonth('date', $month)
							->whereDay('date', $day)->first();
		if ($meal) {
			return $meal->number_of_meal;
		}else {
			return 0;
		}
	}

	/**
	 * get meals by carbon date and user_id
	 */
	public static function get_meal_for_full_month($user_id, $year_month) 
	{
		$month = $year_month->month;
		$year = $year_month->year;
		$meal = Meal::where('user_id', $user_id)
							->whereYear('date', $year)
							->whereMonth('date', $month)
							->get()->sum('number_of_meal');
		if ($meal) {
			return $meal;
		}else {
			return 0;
		}
	
	}

	/**
	 * generating formatted date from date, and day 
	 * $year_month - carbon instance 
	 * day of the month 
	 */
	
	public static function formatted_date($year_month, $day) {
		$month = $year_month->month;
		$year = $year_month->year;
		$return_date =  Carbon::createFromDate($year, $month, $day)
											->toFormattedDateString();
		return $return_date;
	}




}
