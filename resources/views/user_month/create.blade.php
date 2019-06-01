@extends('layouts.app')
@section('content')
<h2 class="my-2">Add a User month</h2>
@include('partials.errors')
@include('partials.alert')
<form action='{{ route('user-month.store') }}' method="post">

  @csrf
  <div class='form-group'>
    <label for="date">Select a Month</label>
    <input type="text"
      name="year_month"
      autocomplete="off"
      placeholder="Select a month"
      class="datepicker-here form-control"
      data-language='en'
      data-min-view="months"
      data-view="months"
      data-date-format="MM yyyy" />
  </div>
  <!-- /.form-group -->
  <div class='form-group'>
    <label for="user_ids">User</label>
    <select class="form-control" name="user_ids[]" multiple="multiple" id="user_ids">
      @foreach ($users as $user)
        <option
          {{old('user_id') == $user->id ? 'selected' : ''}}
          value="{{$user->id}}">{{ $user->display_name ? $user->display_name : $user->name }}</option>
      @endforeach
    </select>
  </div>
  <!-- /.form-group -->



  <div class='form-group'>
    <button class="btn btn-info" type="submit">Add</button>
  </div>

</form>
@endsection

@push('script')
<script>
$('#user_ids').select2();
</script>
@endpush
