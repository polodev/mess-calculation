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
      $date = Carbon::now();
      if (request('timeline')) {
        $timeline = Carbon::parse(request('timeline'));
        $timeline = $timeline->add(5, 'day');
        $date = $timeline;
      }
      $users = User::all();
      return view('meal.index', compact( 'users', 'date' ) );
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'date'    => 'required',
            'number_of_meal'  => 'required',
        ]);
        $user_id        = request('user_id');
        $date           = request('date');
        $number_of_meal = request('number_of_meal');
        $date           = Carbon::parse($date);
        // return $date;
        // $date = Carbon::parse( '07-05-2019');
        $meal = Meal::whereDate('date', $date)
                  ->where('user_id', $user_id)
                  ->first();
        if ($meal) {
          $meal->number_of_meal = $number_of_meal;
          $meal->save();
          return back()->withMessage('Meal Updated Successfully');
        }
        Meal::create([
          'user_id'        => $user_id,
          'number_of_meal' => $number_of_meal,
          'date'           => $date,
        ]);
        return back()->withMessage('Meal Added successfully');
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
