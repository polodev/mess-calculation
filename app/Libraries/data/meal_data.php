<?php 

// use Carbon\Carbon;

// $mutable = Carbon::now();


$meals = [];

foreach (range(1, 4) as $day) {
	foreach (range(1, 4) as $user_id) {
		$meals[] = [
			'user_id' => $user_id,
			'date' => $mutable->add($day, 'day'),
			'number_of_meal' => 2,
		];
	}
}





