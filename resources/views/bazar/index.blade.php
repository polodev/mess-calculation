@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>
<div class="my-2">
	<a class="btn btn-info" href="{{ route('bazar.create') }}">Add Bazar</a>
</div>
<h1 class="my-3">All Bazar: {{ $year_month->monthName }}, {{ $year }}</h1>

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



<div class='table-responsive'>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Date </th>
				<th>User </th>
				<th>Type </th>
				<th>Cost </th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($bazars as $bazar)
				<tr>
					<td>
						{{ $bazar->date->toFormattedDateString() }}
					</td>
					<td>
						{{ $bazar->user->name }}
					</td>
					<td>
						{{ $bazar->type }}
					</td>
					<td>
						{{ $bazar->cost }}
					</td>
					<td>
						<a class="btn btn-secondary" href="{{ route('bazar.edit', ['bazar' => $bazar->id]) }}">Edit</a>
						<form onsubmit="return confirm('Are you sure you want to delete this entry?')" method="post" class="d-inline" action="{{ route('bazar.destroy', ['bazar' => $bazar->id]) }}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">DELETE</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@push('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/air-datepicker/datepicker.min.css') }}">
@endpush

@push('script')
	<script src="{{ asset('vendor/air-datepicker/datepicker.min.js') }}"></script>
	<script src="{{ asset('vendor/air-datepicker/datepicker.en.js') }}"></script>

<script>

function meal_inline_update(el) {
	var $el = $(el);
	var data = {
		 number_of_meal : $el.text(),
		 year_month     : $el.data('year_month'),
		 day            : $el.data('day'),
		 user_id        : $el.data('user_id'),
	 };
	 axios.post( "{{ route('meal.inline_update') }}", data)
	 			.then(function (response) {
	 				console.log('response', response);
				 });
}

 $(document).on('blur', '.editable', function(){
 	meal_inline_update(this);
 })


	// console.log('axios', axios);
</script>
@endpush