@extends('layouts.app')
@section('content')
<?php
	$month = $year_month->month;
	$year = $year_month->year;
	$no_of_days_in_month = $year_month->daysInMonth ;
?>
@if(false)
	<div class="my-2">
		<a class="btn btn-info" href="{{ route('debit-credit.create') }}">Add Deposit information</a>
	</div>
@endif
<h1 class="my-3">All debit-credit of - {{ $year_month->monthName }}, {{ $year }}</h1>

@include('partials.alert')

<div class='card my-3'>
	<div class='card-header'>
		<h1>Timeline</h1>
		<form action='{{ route('debit-credit.index') }}'>
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


<h1 class="mt-5 mb-3">Deposit Given: </h1>


<div class='table-responsive'>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date</th>
			<th>Money Given by</th>
			<th>Money Taken by</th>
			<th>Amount</th>
		</thead>
		<tbody>
			@foreach ($debit_credits as $debit_credit)
				<tr>
					<td>
						{{ $debit_credit->date->toFormattedDateString() }} -
						({{ $debit_credit->date->shortEnglishDayOfWeek }})
					</td>
					<td>
						{{ $debit_credit->creditor->name }}
					</td>
					<td>
						{{ $debit_credit->debitor->name }}
					</td>
					<td>
						<a href="{{ route('debit-credit.show', ['id' => $debit_credit->id]) }}">
							{{ $debit_credit->amount }}
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection


