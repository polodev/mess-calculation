@extends('layouts.app')
@section('content')
<?php
	$date = Carbon::now();
	$month = $date->month;
	$year = $date->year;
	$no_of_days_in_month = $date->daysInMonth ;
?>
<div class="my-2">
	<a class="btn btn-info" href="{{ route('meal.create') }}">Add Meal</a>
</div>
<h1 class="my-3">All Meals: {{ $date->monthName }}, {{ $year }}</h1>


<div class='row'>
	<div class='col-md-6'>
		<div class='table-responsive'>
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
						@foreach ($users as $user)
							<th>{{ Helpers::get_meal_for_full_month($user->id, $date) }}</th>
						@endforeach
					</tr>
				</tfoot>
				<tbody>
					@foreach (range(1, $no_of_days_in_month) as $day)
					<tr>
						<td> <strong> {{ Helpers::formatted_date($date, $day) }} </strong> </td>
						@foreach ($users as $user)
							<td>{{ Helpers::get_meal($user->id, $date, $day) }}</td>
						@endforeach

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.row -->

@endsection