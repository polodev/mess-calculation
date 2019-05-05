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

<div class='row'>
	<div class='col-md-5'>
		<div class='card'>
			<div class='card-header'>
				<h2>At a Glance</h2>
			</div>
			<!-- /.card-header -->
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
				<!-- /.table-bordered -->
			</div>
			<!-- /.card-body -->
		</div>
	</div>
	<!-- /.col-md-5 -->
</div>
<!-- /.row -->
<!-- /.card -->


<div class='table-responsive'>
	<table class="table table-striped">
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
						<a href="{{ route('bazar.show', ['bazar' => $bazar->id]) }}">
							Tk. {{ $bazar->cost }}
						</a>
					</td>
					<td>
						@if(auth()->user()->is_editable($bazar->user_id))
							<a class="btn btn-secondary btn-sm" href="{{ route('bazar.edit', ['bazar' => $bazar->id]) }}">Edit</a>
							<form onsubmit="return confirm('Are you sure you want to delete this entry?')" method="post" class="d-inline" action="{{ route('bazar.destroy', ['bazar' => $bazar->id]) }}">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger btn-sm" type="submit">DELETE</button>
							</form>
						@else 
							Not applicable
						@endif
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