@extends('layouts.app')
@section('content')
<h2 class="my-2">Add a deposit info</h2>
@include('partials.errors')
@include('partials.alert')
<form action='{{ route('debit-credit.store') }}' method="post">

	@csrf
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
					{{old('user_id') == $user->id ? 'selected' : ''}}
					value="{{$user->id}}">{{ $user->name }}</option>
			@endforeach
		</select>
	</div>


	<div class='form-group'>
		<label for="amount">Amount</label>
		<input type='number' name='amount' id='amount' class="form-control" required />
	</div>	

	<div class='form-group'>
		<label for="more_info">more_info</label>
		<textarea type='text' name='more_info' id='more_info' class="form-control" ></textarea>
	</div>

	<div class='form-group'>
		<button class="btn btn-info" type="submit">Add</button>
	</div>
	
</form>
@endsection

@push('script')
<script>
$("#date").flatpickr({
  dateFormat: "d-m-Y",
  maxDate: 'today',
 <?php if (old('date')): ?>
  defaultDate: '{{ old('date') }}'
<?php endif; ?>
});
</script>
@endpush