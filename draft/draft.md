
## flatpickr
~~~js 
$("#date_of_expected_travel").flatpickr({
  dateFormat: "d-m-Y",
  minDate: 'today',
  });
$('#countries').select2();
~~~

# carbon 
$year = 2000; $month = 4; $day = 19;
$hour = 20; $minute = 30; $second = 15; $tz = 'Europe/Madrid';
echo Carbon::createFromDate($year, $month, $day, $tz)."\n";