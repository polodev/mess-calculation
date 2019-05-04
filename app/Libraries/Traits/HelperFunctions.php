<?php

namespace App\Libraries\Traits;

use Carbon\Carbon;



trait HelperFunctions {
	
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
}
