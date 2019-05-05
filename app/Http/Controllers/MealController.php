<?php

namespace App\Http\Controllers;

use App\Meal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $year_month = Carbon::now();
      if (request('timeline')) {
        $timeline = Carbon::parse(request('timeline'));
        $timeline = $timeline->add(5, 'day');
        $year_month = $timeline;
      }
      $users = User::where('enable', 1)->get();
      return view('meal.index', compact( 'users', 'year_month' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $users = User::all();
      return view('meal.create', compact('users'));
    }

    protected function create_or_update_meal($user_id, $date, $number_of_meal)
    {

      $meal = Meal::whereDate('date', $date)
                  ->where('user_id', $user_id)
                  ->first();
      if ($meal) {
        $meal->number_of_meal = $number_of_meal;
        $meal->save();
        return 'Updated';
      }  else {
        Meal::create([
          'user_id'        => $user_id,
          'number_of_meal' => $number_of_meal,
          'date'           => $date,
        ]);
        return 'Added';
      }
    }

    public function inline_update(Request $request)
    {

      // from ajax data
      $user_id        = request('user_id');
      $number_of_meal = request('number_of_meal');
      $year_month     = Carbon::parse( request('year_month'));
      $day            = request('day');

      // generating date 
      $month = $year_month->month;
      $year = $year_month->year;
      $date =  Carbon::createFromDate($year, $month, $day);

      $status = $this->create_or_update_meal($user_id, $date, $number_of_meal);

      return response($status, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'    => 'required',
            'number_of_meal'  => 'required',
        ]);

        $user_id        = request('user_id');
        $auth_user = auth()->user();
        if ($auth_user->isAdmin() || !$user_id) {
          $user_id = $auth_user->id;
        }

        $date           = request('date');
        $number_of_meal = request('number_of_meal');
        $date           = Carbon::parse($date);

        $status = $this->create_or_update_meal($user_id, $date, $number_of_meal);
        return back()->withMessage("Meal $status Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  }
