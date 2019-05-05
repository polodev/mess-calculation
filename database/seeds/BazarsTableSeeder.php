<?php

use App\Bazar;
use Illuminate\Database\Seeder;

class BazarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	foreach (Helpers::bazars() as $bazar) {
    		Bazar::create($bazar);
    	}
    }
}
