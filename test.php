<?php 

$user_id = 2;
$array = range(1, 4);
$user_ids = array_filter($array, function ($value) use($user_id) {
	return $value != $user_id;
});

print_r($user_ids);
print_r($array);
// $debit_to = $user_ids[array_rand($user_ids)];

// echo $debit_to;