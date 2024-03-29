<?php

namespace App\Libraries\Traits;

use App\Libraries\Helpers;
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
	 * generate fake bazar data
	 * for seeding data
	 */

	public static function bazars()
	{
		$bazars = [];
		foreach (range(0, 12) as $day) {
			$mutable = Carbon::now()->sub($day, 'day');

			foreach (range(1, 4) as $user_id) {
				$bazars[] = [
					'user_id' => $user_id,
					'title'   => 'meat and others item',
					'date' => $mutable->toDateString(),
					'type' => Helpers::types[array_rand(Helpers::types)],
					'more_info' => 'just some bazars',
					'cost' => rand(200, 1000),
				];
			}
		}
		return $bazars;

	}

		/**
	 * generate fake bazar data
	 * for seeding data
	 */

	public static function debitcredits()
	{

		$debitcredits = [];
		foreach (range(0, 12) as $day) {
			$mutable = Carbon::now()->sub($day, 'day');

			foreach (range(1, 4) as $user_id) {
				$user_ids = array_filter(range(1, 4), function ($value) use($user_id) {
	      	return $value != $user_id;
				});
				$debit_to = $user_ids[array_rand($user_ids)];
				$debitcredits[] = [
					'credit_to' => $user_id,
					'debit_to'  => $debit_to,
					'date' => $mutable->toDateString(),
					'amount'  => rand(200, 1000),
					'more_info' => 'just deposit to some people',
				];
			}
		}
		return $debitcredits;

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
	public static function formatted_date_day($year_month, $day) {
		$month = $year_month->month;
		$year = $year_month->year;
		$return_date =  Carbon::createFromDate($year, $month, $day)
											->shortEnglishDayOfWeek;
		return $return_date;
	}
  /**
   * generating year month from a date
   * @param  string date
   * @return Carbon instance
   */
  public static function generating_year_month($date_string) {
    $year_month = Carbon::parse($date_string);
    // generating date
    $month = $year_month->month;
    $year = $year_month->year;
    $date =  Carbon::createFromDate($year, $month, 1);
    return $date;
  }




}
