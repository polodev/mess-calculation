<?php

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
	Route::get('debit-credit-all', 'DebitCreditController@index_all')->name('debit-credit.index_all');
	Route::post('meal-inline-update', 'MealController@inline_update')->name('meal.inline_update');
	Route::post('meal-total-inline-update', 'MealController@inline_total_update')->name('meal.inline_total_update');
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/user-month', 'UserMonthController@index' );
});

Auth::routes();

Route::get('/about', function() {
  return view('about');
})->name('about');
