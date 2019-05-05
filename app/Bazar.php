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
}
