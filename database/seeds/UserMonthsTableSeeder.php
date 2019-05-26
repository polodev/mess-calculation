<?php

use App\UserMonth;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserMonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $year_month = Carbon::now();
      $user_ids      = [1, 3, 4];

      UserMonth::create([
        'year_month' => $year_month,
        'user_ids'   => json_encode($user_ids),
      ]);

    }
}
