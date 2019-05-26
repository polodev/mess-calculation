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
      $year_months = [
        [
          'ym' => Carbon::now(),
          'uds' => [1, 2, 3 ],
        ],
        [
          'ym' => Carbon::now()->sub(35, 'day'),
          'uds' => [2, 3, 4],
        ],
        [
          'ym' => Carbon::now()->sub(65, 'day'),
          'uds' => [3, 4, 5],
        ],
      ];

      foreach ($year_months as $single_month) {
        UserMonth::create([
          'year_month' => $single_month['ym'],
          'user_ids' => json_encode( $single_month['uds'] ),
        ]);
      }


    }
}
