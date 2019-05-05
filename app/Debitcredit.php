<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debitcredit extends Model
{
	protected $guarded = [];
	protected $dates = ['date'];
	public function debitor()
	{
		return $this->belongsTo(User::class, 'debit_to');
	}
	public function creditor()
	{
		return $this->belongsTo(User::class, 'credit_to');
	}
  public function scopeFilterYearMonth($query, $year_month)
  {
  	 $year = $year_month->year;
     $month = $year_month->month;
     $query->whereYear('date', $year)->whereMonth('date', $month);
  }
}
