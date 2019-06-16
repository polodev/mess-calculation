<?php

namespace App\Http\Controllers;

use App\Bazar;
use App\Debitcredit;
use App\Meal;
use App\Role;
use App\User;
use App\UserMonth;
use Illuminate\Http\Request;

class ExportImportController extends Controller
{
  public function export($table_name = 'user')
  {
    $tables = [
      'user' => User::class,
      'bazar' => Bazar::class,
      'debitcredit' => Debitcredit::class,
      'meal' => Meal::class,
      'usermonth' => UserMonth::class,
      'role' => Role::class,
    ];
    if ( array_key_exists($table_name, $tables) ) {
      $results =  $tables[$table_name]::get()->toArray();
      return response()->json($results);
    } else {
      return "Table not found";
    }
  }
}
