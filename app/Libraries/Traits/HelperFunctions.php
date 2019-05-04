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
		foreach (range(1, 14) as $day) {
			$mutable = Carbon::now()->add($day, 'day');

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
	public static function get_meal($user_id, $date, $day) 
	{
		$month = $date->month;
		$year = $date->year;
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
	public static function get_meal_for_full_month($user_id, $date) 
	{
		$month = $date->month;
		$year = $date->year;
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
	 * $date - carbon instance 
	 * day of the month 
	 */
	
	public static function formatted_date($date, $day) {
		$month = $date->month;
		$year = $date->year;
		$return_date =  Carbon::createFromDate($year, $month, $day)
											->toFormattedDateString();
		return $return_date;
	}




}
