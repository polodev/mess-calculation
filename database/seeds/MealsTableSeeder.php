<?php

use App\Meal;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (Helpers::meals() as $meal) {
    		Meal::create($meal);
    	}
    }
}
