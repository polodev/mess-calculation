<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RolesTableSeeder::class);
      if (! config('app.only_role_seed')) {
        $this->call(UsersTableSeeder::class);
        $this->call(MealsTableSeeder::class);
        $this->call(BazarsTableSeeder::class);
        $this->call(DebitcreditsTableSeeder::class);
      }
    }
  }
