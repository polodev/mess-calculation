<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMonth extends Model
{
  protected $guarded = [];
  protected $dates = ['year_month'];

}
