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
<h1 class="my-3">My debit-credit of - {{ $year_month->monthName }}, {{ $year }}</h1>

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
			<th>Deposite To</th>
			<th>Amount</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach ($credits as $credit)
				<tr>
					<td>
						{{ $credit->date->toFormattedDateString() }} -
						({{ $credit->date->shortEnglishDayOfWeek }})
					</td>
					<td>
						{{ $credit->debitor->name }}
					</td>
					<td>
						{{ $credit->amount }}
					</td>
					<td>
						<form
							onsubmit="return confirm('Are you sure you want to delete this entry?')"
							method="post"
							class="d-inline"
							action="{{ route('debit-credit.destroy', ['id' => $credit->id]) }}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-sm" type="submit">DELETE</button>
						</form>
					</td>
				</tr>
			@endforeach
			<tr>
				<th colspan="2">Total I have given</th>
				<td>{{ $credits_total }}</td>
				<td>--</td>
			</tr>
		</tbody>
	</table>
</div>

<h1 class="mt-5 mb-3">Deposit Taken: </h1>
<div class='table-responsive'>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date</th>
			<th>Money Taken from</th>
			<th>Amount</th>
		</thead>
		<tbody>
			@foreach ($debits as $debit)
				<tr>
					<td>
						{{ $debit->date->toFormattedDateString() }} -
						({{ $debit->date->shortEnglishDayOfWeek }})
					</td>
					<td>
						{{ $debit->creditor->name }}
					</td>
					<td>
						{{ $credit->amount }}
					</td>
				</tr>
			@endforeach
			<tr>
				<th colspan="2">Total I have taken</th>
				<td>{{ $debits_total }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection


