<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
	protected $guarded = [];
	protected $dates = ['date'];

	public function user() 
	{
		return $this->belongsTo(User::class);
	}
  public function scopeFilterYearMonth($query, $year_month)
  {
  	 $year = $year_month->year;
     $month = $year_month->month;
     $query->whereYear('date', $year)->whereMonth('date', $month);
  }

}
