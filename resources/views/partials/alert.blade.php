@if(session()->has('message'))
<div class='alert alert-success my-2'>
	<h2> {{ session('message') }} </h2>
</div>
@endif
<!-- /.alert alert-success -->