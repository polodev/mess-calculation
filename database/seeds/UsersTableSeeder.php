<?php

use App\Libraries\Helpers;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // User::truncate();
      DB::table('users')->delete();
      foreach (Helpers::users as $user) {
        User::create([
          'name' => $user['name'],
          'email' => $user['email'],
          'display_name' => $user['display_name'],
          'password' => bcrypt('bangladesh101'),
          'role_id' => $user['role_id'],
        ]);
      }


    }
}
