@extends('layouts.app')
@section('content')
<h2 class="my-2">Add a meal</h2>
<form action='{{ route('meal.store') }}' method="post">
	@csrf

	

	<div class='form-group'>
		<button type="submit">Add</button>
	</div>
	
</form>
@endsection