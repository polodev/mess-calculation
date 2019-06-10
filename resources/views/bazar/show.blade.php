@extends('layouts.app')
@section('content')
<h2 class='my-3'>Bazar Detials</h2>

<div class='row'>
	<div class='col-md-6'>
		<table class='table table-bordered'>
			<tr>
				<th>Date:</th>
				<td>{{ $bazar->date }}</td>
			</tr>
			<tr>
				<th>User:</th>
				<td>{{ $bazar->user->name }}</td>
			</tr>
			<tr>
				<th>Cost:</th>
				<td>{{ $bazar->cost }}</td>
			</tr>
			<tr>
				<th>Bazar type:</th>
				<td>{{ $bazar->type }}</td>
			</tr>
			<tr>
				<th>Mor Info:</th>
				<td>{{ nl2br( $bazar->more_info ) }}</td>
			</tr>

		</table>
	</div>
</div>
@if(auth()->user()->is_editable($bazar->user_id))
	<a class="btn btn-secondary" href="{{ route('bazar.edit', ['bazar' => $bazar->id]) }}">Edit</a>
	<form onsubmit="return confirm('Are you sure you want to delete this entry?')" method="post" class="d-inline" action="{{ route('bazar.destroy', ['bazar' => $bazar->id]) }}">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger" type="submit">DELETE</button>
	</form>
@endif

@endsection
