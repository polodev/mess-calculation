@extends('layouts.app')
@section('content')
<div class="my-2">
	<a class="btn btn-info" href="{{ route('meal.create') }}">Create</a>
</div>
<h1>All Meals: May 2019</h1>

<?php
	$date = Carbon::now();
	$month = $date->month;
	$year = $date->year;
	$no_of_days_in_month = $date->daysInMonth ;
?>
<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th>Day </th>
			@foreach ($users as $user)
				<th>{{$user->display_name ? $user->display_name : $user->name }}</th>
			@endforeach
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Total: </th>
			@foreach ($users as $user)
				<th>{{ Helpers::get_meal_for_full_month($user->id, $date) }}</th>
			@endforeach
		</tr>
	</tfoot>
	<tbody>
		@foreach (range(1, $no_of_days_in_month) as $day)
		<tr>
			<td>{{ $day }}</td>
			@foreach ($users as $user)
				<td>{{ Helpers::get_meal($user->id, $date, $day) }}</td>
			@endforeach

		</tr>
		@endforeach
	</tbody>
</table>

@endsection