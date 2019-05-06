@extends('layouts.app')
@section('content')
<h2 class="my-2">Add a bazar</h2>
@include('partials.errors')
@include('partials.alert')
<div class='alert alert-info'>
	<p>
		Regular bazar: Self explanatory
	</p>
	<p>
		Others bazar: all <strong>fixed</strong> cost which will be divide by mess member. eg. Net bill, electricity, gas bill, bari vhara, khala bill, garbage bill
	</p>
	<p>
		Common bazar: all <strong>variable</strong> cost which will be divide by mess member. eg. purchasing a "Jaru", "vim" for mess. It will be very few.
	</p>
</div>
<!-- /.alert alert-info -->
<form action='{{ route('bazar.store') }}' method="post">

	@csrf
	<div class='form-group'>
		<label for="date">Date</label>
		<input placeholder="Bazar Date" type="text" name="date" class="form-control" id="date">
	</div>
	<!-- /.form-group -->
	@if(false)
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
	@endif
	<?php



	 ?>
	<div class='form-group'>
		<label for="type">Type of cost</label>
		<select class="form-control" name="type" id="type">
			@foreach (Helpers::types as $type)
				<option
					{{old('type') == $type ? 'selected' : ''}}
					value="{{ $type }}">{{ ucfirst( $type ) }}</option>
			@endforeach
		</select>
	</div>

	<div class='form-group'>
		<label for="cost">Bazar Cost</label>
		<input value="{{ old('cost') }}" type='number' name='cost' id='cost' class="form-control" />
	</div>

	<div class='form-group'>
		<label for="title">title (little info) - make it short - 2 or 3 words</label>
		<input value="{{ old('title') }}" type='text' name='title' id='title' class="form-control" />
	</div>

	<div class='form-group'>
		<label for="more_info">More Information of Bazar (optional)</label>
		<textarea rows="10" name="more_info" class="form-control" id="more_info">{{ old('more_info') }}</textarea>
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