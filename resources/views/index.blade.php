@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>

@include('partials.alert')

<div class='card my-3'>
	<div class='card-header'>
		<h1>Timeline</h1>
		<form action='{{ route('front.index') }}'>
			<div class='form-group'>
				<input type="text"
					name="timeline" 
					autocomplete="off" 
					placeholder="Select a month" 
	        class="datepicker-here form-control"
	        data-language='en'
	        data-min-view="months"
	        data-view="months"
	        data-date-format="MM yyyy" />
			</div>
			<div class='form-group'>
				<button class="btn btn-info" type="submit">submit</button>
			</div>
			<!-- /.form-group -->
		</form>

	</div>
	<!-- /.card-header -->
</div>
<!-- /.card -->

<div class='row'>
	<div class='col-md-5'>
		<div class='card'>
			<div class='card-header'>
				<h2>At a Glance</h2>
			</div>
			<div class='card-body'>
				<table class='table table-bordered'>
					<tr>
						<th>Regular bazar cost</th>
						<td>Tk. {{ $regular_bazars_cost }}</td>
					</tr>
					<tr>
						<th>Common bazar cost</th>
						<td>Tk. {{ $common_bazars_cost }}</td>
					</tr>
					<tr>
						<th>Others bazar cost</th>
						<td>Tk. {{ $others_bazars_cost }}</td>
					</tr>
					<tr>
						<th>Total meal</th>
						<td>{{ $total_meal }}</td>
					</tr>
					<tr>
						<th>Total user</th>
						<td>{{ count($users) }} person</td>
					</tr>
					<tr>
						<th>Common cost per user</th>
						<td>Tk. {{ $common_cost_per_user }}</td>
					</tr>
					<tr>
						<th>Others cost per user</th>
						<td>Tk. {{ $others_cost_per_user }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<div class='card'>
	<div class='card-header'>
		Costs by user
	</div>
	<!-- /.card-header -->
	<div class='card-body'>
		<table class='table table-striped'>
			<thead>
				<th>User</th>
				<th>No of meal</th>
				<th>Meal cost</th>
				<th>Common cost</th>
				<th>Others cost</th>
				<th>Total</th>
				<th>Get/Due</th>
			</thead>
			@foreach ($costs as $cost)
		    <tr>
					<td>
						{{ $cost['user']->name }}
					</td>
					<td>
						{{ $cost['number_of_meal'] }}
					</td>
					<td>
						{{ $cost['meal_cost'] }}
					</td>
					<td>
						{{ $common_cost_per_user }}
					</td>
					<td>
						{{ $others_cost_per_user }}
					</td>
					<td>
						{{ $cost['total_cost'] }}
					</td>
					<td>
						{{ $cost['get_or_due'] }}
					</td>
			  </tr>
			@endforeach
		</table>
		<!-- /.table table-striped -->
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->


@endsection
