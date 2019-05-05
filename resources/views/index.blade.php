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
		<form action='{{ route('bazar.index') }}'>
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
						<th>Regular Bazar Cost</th>
						<td>Tk. {{ $regular_bazars_cost }}</td>
					</tr>
					<tr>
						<th>Common Bazar Cost</th>
						<td>Tk. {{ $common_bazars_cost }}</td>
					</tr>
					<tr>
						<th>Others Bazar Cost</th>
						<td>Tk. {{ $others_bazars_cost }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection
