@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>
@if(false)
	<div class="my-2">
		<a class="btn btn-info" href="{{ route('meal.create') }}">Add Meal</a>
	</div>
@endif
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



<div class='table-responsive'>
	<table class="table table-striped table-bordered">
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
					<th
						data-user_id = "{{$user->id}}"
						data-year_month = "{{ $year_month }}"
						class="total_meal"
					>{{ Helpers::get_meal_for_full_month($user->id, $year_month) }}</th>
				@endforeach
			</tr>
		</thead>

		@if(false)
			<tfoot>
				<tr>
					<th>Total: </th>
					@foreach ($users as $user)
						<th
							data-user_id = "{{$user->id}}"
							data-year_month = "{{ $year_month }}"
							class="total_meal"
						>{{ Helpers::get_meal_for_full_month($user->id, $year_month) }}</th>
					@endforeach
				</tr>
			</tfoot>
		@endif

		<tbody>

			@foreach (range(1, $no_of_days_in_month) as $day)
			<tr>
				<td> 
					 {{ Helpers::formatted_date($year_month, $day) }} 
					 ({{ Helpers::formatted_date_day($year_month, $day) }})
				</td>
				@foreach ($users as $user)
					<td 
						class="editable" 
						@if( auth()->user()->is_editable($user->id) )
							contenteditable="true" 
						@endif

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
@endsection


@push('script')

<script>

function meal_inline_update(el) {
	var $el = $(el);
	var user_id = $el.data('user_id');
	var data = {
		 number_of_meal : $el.text(),
		 year_month     : $el.data('year_month'),
		 day            : $el.data('day'),
		 user_id        : user_id,
	 };
	 axios.post( "{{ route('meal.inline_update') }}", data)
	 			.then(function (response) {
	 				console.log('response', response);
	 				meal_inline_total_update(user_id)
				 });
}

 $(document).on('blur', '.editable', function(){
 	meal_inline_update(this);
 })

 function meal_inline_total_update(child_user_id) {
	 $('.total_meal').each(function(index, el) {
	 	var $el     = $(el);
	 	var user_id = $el.data('user_id');
	 	if (user_id == child_user_id) {
			var data = {
				year_month     : $el.data('year_month'),
				user_id        : user_id,
			};
		  axios.post( "{{ route('meal.inline_total_update') }}", data)
	 			.then(function (response) {
	 				$el.text(response.data);
				 });
	 	}

	 })

 }




	// console.log('axios', axios);
</script>
@endpush