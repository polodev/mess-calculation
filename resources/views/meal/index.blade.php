@extends('layouts.app')
@section('content')
<div class="my-2">
	<a class="btn btn-info" href="{{ route('meal.create') }}">Create</a>
</div>
<h1>All Meals: May 2019</h1>

<table class="table table-bordered">
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
			<th>25</th>
			<th>29</th>
			<th>20</th>
			<th>22</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
		$date = Carbon::now();
		$month = $date->month;
		$year = $date->year;
		echo $year;
		$no_of_days_in_month = $date->daysInMonth ;
		?>
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