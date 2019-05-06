@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>
<div class="mt-2">
	<a class="btn btn-info" href="{{ route('bazar.create') }}">Add Bazar</a>
</div>
<h1 class="my-2">All Bazar: {{ $year_month->monthName }}, {{ $year }}</h1>

@include('partials.alert')

<div class='card my-5'>
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

<div class='row my-5'>
	<div class='col-md-5'>
		<div class='card'>
			<div class='card-header'>
				<h2>At a Glance</h2>
			</div>
			<!-- /.card-header -->
			<div class='card-body'>
				<table class='table table-striped table-bordered'>
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
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Date </th>
				<th>User </th>
				<th>Type </th>
				<th>Title </th>
				<th>Cost </th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($bazars as $bazar)
				<tr>
					<td>
						{{ $bazar->date->toFormattedDateString() }} -
						({{ $bazar->date->shortEnglishDayOfWeek }})
					</td>
					<td>
						{{ $bazar->user->name }}
					</td>
					<td>
						{{ $bazar->type }}
					</td>
					<td>
						{{ $bazar->title }}
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

@push('script')

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