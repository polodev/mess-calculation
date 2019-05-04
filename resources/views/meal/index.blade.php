@extends('layouts.app')
@section('content')
<div class='container'>
	<div class="my-2">
		<a class="btn btn-info" href="{{ route('meal.create') }}">Create</a>
	</div>
	<h1>All Meals: May 2019</h1>

<table>
	<tr>
		<th>Date</th>
	</tr>
</table>



</div>
@endsection