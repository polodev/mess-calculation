@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>
<div class="my-2">
	<a class="btn btn-info" href="{{ route('meal.create') }}">Add Meal</a>
</div>
<h1 class="my-3">All Meals: {{ $year_month->monthName }}, {{ $year }}</h1>

<div class='card my-3'>
	<div class='card-header'>
		<h1>Timeline</h1>
		<form action='{{ route('meal.index') }}'>
			<div class='form-group'>
				{{-- <input type='text' name='timeline' id='timeline' class="form-control" /> --}}
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
					{{-- just keep it top as well --}}
					<tr>
						<th>Total: </th>
						@foreach ($users as $user)
							<th>{{ Helpers::get_meal_for_full_month($user->id, $year_month) }}</th>
						@endforeach
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Total: </th>
						@foreach ($users as $user)
							<th>{{ Helpers::get_meal_for_full_month($user->id, $year_month) }}</th>
						@endforeach
					</tr>
				</tfoot>
				<tbody>

					@foreach (range(1, $no_of_days_in_month) as $day)
					<tr>
						<td> <strong> {{ Helpers::formatted_date($year_month, $day) }} </strong> </td>
						@foreach ($users as $user)
							<td 
								class="editable" 
								contenteditable="true" 
								data-year_month="{{ $year_month }}"
								data-user_id="{{ $user->id }}"
								data-day="{{ $day }}"
							 >{{ Helpers::get_meal($user->id, $year_month, $day) }}</td>
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