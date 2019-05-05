@extends('layouts.app')
@section('content')
<h2 class="my-2">Add a meal</h2>
@include('partials.errors')
@include('partials.alert')
<form action='{{ route('meal.store') }}' method="post">

	@csrf
	<div class='form-group'>
		<label for="date">Date of Bazar</label>
		<input type="text" name="date" class="form-control" id="date">
	</div>
	<!-- /.form-group -->
	<div class='form-group'>
		<label for="user_id">User</label>
		<select class="form-control" name="user_id" id="user_id">
			@foreach ($users as $user)
				<option
					{{old('user_id') == $user->id ? 'selected' : ''}}
					value="{{$user->id}}">{{ $user->display_name ? $user->display_name : $user->name }}</option>
			@endforeach
		</select>
	</div>
	<!-- /.form-group -->

	<div class='form-group'>
		<label for="number_of_meal">Number Of Meal</label>
		<input value="{{ old('number_of_meal') }}" type='number' name='number_of_meal' id='number_of_meal' class="form-control" />
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