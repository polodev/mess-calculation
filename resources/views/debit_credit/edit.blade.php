@extends('layouts.app')
@section('content')
<h2 class="my-2">Edit the deposit info</h2>
@include('partials.errors')
@include('partials.alert')


<form action='{{ route('debit-credit.update', ['id' => $debit_credit->id]) }}' method="post">

	@csrf
	@method('PUT')
	<div class='form-group'>
		<label for="date">Date of deposit</label>
		<input type="text" name="date" class="form-control" id="date" required>
	</div>
	<!-- /.form-group -->
	<div class='form-group'>
		<label for="user_id">Deposit to whom</label>
		<select class="form-control" name="user_id" id="user_id">
			@foreach ($users as $user)
				<option
					{{old('user_id', $debit_credit->user_id) == $user->id ? 'selected' : ''}}
					value="{{$user->id}}">{{ $user->name }}</option>
			@endforeach
		</select>
	</div>


	<div class='form-group'>
		<label for="amount">Amount</label>
		<input value="{{ old('amount', $debit_credit->amount) }}" type='number' name='amount' id='amount' class="form-control" required />
	</div>	

	<div class='form-group'>
		<label for="more_info">more_info</label>
		<textarea type='text' name='more_info' id='more_info' class="form-control" >{{ old('more_info', $debit_credit->more_info) }}</textarea>
	</div>

	<div class='form-group'>
		<button class="btn btn-info" type="submit">Add</button>
	</div>
	
</form>

<?php

$db_date = $debit_credit->date->format('d-m-Y');
$db_date = old('date', $db_date);

?>
@endsection

@push('script')
<script>
$("#date").flatpickr({
  dateFormat: "d-m-Y",
  maxDate: 'today',
  defaultDate: '{{ $db_date }}'
});
</script>
@endpush