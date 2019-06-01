@extends('layouts.app')
@section('content')

@if(auth()->user()->isAdmin())
<div class="">
  <a class="btn btn-info" href="{{ route('user-month.create') }}">Add user member</a>
</div>
@endif

<h2 class="my-3">Mess member in each month</h2>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <td>Month</td>
      <td>Users</td>
      @if(auth()->user()->isAdmin())
        <td>Action</td>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($user_months_data as $single_data)
      <?php
        $user_month = $single_data['user_month'] ;
        $users = $single_data['users'];
        $year_month = $user_month->year_month;
        $month = $year_month->month;
        $year = $year_month->year;
      ?>
      <tr>
        <td>{{ $year_month->monthName }}, {{ $year }}</td>
        <td>
           {{ $single_data['users'] }}
        </td>
        @if(auth()->user()->isAdmin())
          <td>
            <form onsubmit="return confirm('Are you sure you want to delete this entry?')" method="post" class="d-inline" action="{{ route('user-month.destroy', ['user-month' => $user_month->id]) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
            </form>
          </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
