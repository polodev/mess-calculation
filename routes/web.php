<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'FrontController@index')->name('front.index');
	Route::resource('bazar', 'BazarController');
	Route::resource('meal', 'MealController');
	Route::resource('debit-credit', 'DebitCreditController');
  Route::resource('/user-month', 'UserMonthController' );
	Route::get('debit-credit-all', 'DebitCreditController@index_all')->name('debit-credit.index_all');
	Route::post('meal-inline-update', 'MealController@inline_update')->name('meal.inline_update');
	Route::post('meal-total-inline-update', 'MealController@inline_total_update')->name('meal.inline_total_update');
  Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();

Route::get('/about', function() {
  return view('about');
})->name('about');

Route::get('/test', function() {
  $year_month = Carbon::now();
  $users = User::get_active_user_ids($year_month);
  return $users;
})->name('test');
