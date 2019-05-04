@if($errors->all())
<div class='alert alert-danger my-1'>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>

@endif