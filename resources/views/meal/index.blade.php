@extends('layouts.app')
@section('content')
<div class="my-2">
	<a class="btn btn-info" href="{{ route('meal.create') }}">Create</a>
</div>
<h1>All Meals: May 2019</h1>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Date</th>
			<th>Shibu</th>
			<th>Arif</th>
			<th>tuhin</th>
			<th>Rasel</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Total: </th>
			<th>25</th>
			<th>29</th>
			<th>20</th>
			<th>22</th>
		</tr>
	</tfoot>
	<tbody>
		@foreach (range(1, 3) as $number)
		<tr>
			<td>May 1, 2019</td>
			<td>2</td>
			<td>1</td>
			<td>2</td>
			<td>1</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection