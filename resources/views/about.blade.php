@extends('layouts.app')
@section('content')

<h2>About this Mess </h2>

<p>Flat (mess) initialize By Shibu deb and Arif hossain. </p>

<p>Our monthly rent is 16k. We had to given tk 20,000 as advanced. Which covered by following : </p>

<ul>
  <li>Shibu (Tk 8000)</li>
  <li>Arif (Tk 5500)</li>
  <li>Rasel & tuhin (Tk 6500) </li>
</ul>


<h2>Application features</h2>

<p>
  User can add their meals, bazar, debit credit information
  (deposit information) by login their respective account.
</p>

<h3>About Bazar</h3>
<p> Amount of Bazar will be added as deposit to correspondent user. </p>

<h3>About Debit credit</h3>

<p>If you give any money to any other member of the mess, you need to add a entry from  <code>My Debit credit</code>  section. following field you need for this </p>

<ul>
  <li>Date</li>
  <li>Amount of money you have given</li>
  <li>To whom you gave money</li>
</ul>

<p>
  Man who receive money from you, it will reflect his account as debit value.
</p>

<h3>Home page </h3>
<p>All calculation is displayed in Homepage. User can able to know his cost real time. </p>


<h4>About application hosting</h4>
<p>
  I am using free web hosting in <code>Heroku</code> app.
  Their server sleep if our application not browsing by user within 30 minutes.
  I mean very first time loading our web application will take more time.
  Since it will start their server first then loading our application.
  If app is not using for 30 minutes, it will sleep again. It won't be a problem for use. It just extra one minutes first time load.
</p>

<h5>Export</h5>

<?php

$tables = [
  'user',
  'bazar',
  'debitcredit',
  'meal',
  'usermonth',
  'role',
];

?>
<ul class="list-group my-5">
  @foreach ($tables as $table)
    <li class="list-group-item">
      <a href="{{ route('export', $table) }}">{{$table}}</a>
    </li>
  @endforeach
</ul>











@endsection
