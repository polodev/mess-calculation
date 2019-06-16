<?php

use App\Bazar;
use App\Debitcredit;
use App\Meal;
use App\Role;
use App\User;
use App\UserMonth;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function json_user_seed()
    {
      $users_json = File::get("database/seeds/json/users.json");
      $users = json_decode($users_json);
      $users = array_map(function ($user) {
        $user->password = bcrypt('hello1');
        return $user;
      } , $users);
      foreach ($users as $user) {
        $user = (array) $user;
        User::create( $user );
      }
    }

    public function single_seed($data)
    {
      $jsons = json_decode( $data['file'] );
      $class = $data['class'];
      $name  = $data['name'];

      if ($name == 'user') {
        $jsons = array_map(function ($user) {
          $user->password = bcrypt('hello1');
          return $user;
        } , $jsons);

      }

      foreach ($jsons as $json) {
        $json = (array) $json;
        $class::create( $json );
      }
      echo "$name seeding successful". PHP_EOL;
    }

    public function json_seed()
    {
      $datas = [
        [
          'file'  => File::get("database/seeds/json/role.json"),
          'class' => Role::class,
          'name'  => 'role',
        ],
        [
          'file'  => File::get("database/seeds/json/users.json"),
          'class' => User::class,
          'name'  => 'user',
        ],
        [
          'file'  => File::get("database/seeds/json/meal.json"),
          'class' => Meal::class,
          'name'  => 'meal',
        ],
        [
          'file'  => File::get("database/seeds/json/bazar.json"),
          'class' => Bazar::class,
          'name'  => 'bazar',
        ],
        [
          'file'  => File::get("database/seeds/json/debitcredit.json"),
          'class' => Debitcredit::class,
          'name'  => 'debitcredit',
        ],
        [
          'file'  => File::get("database/seeds/json/usermonth.json"),
          'class' => UserMonth::class,
          'name'  => 'usermonth',
        ],
      ];

      foreach ($datas as $data) {
        $this->single_seed($data);
      }
    }
    public function run()
    {
      // $this->call(RolesTableSeeder::class);
      $this->json_seed();

      // if (! config('app.only_role_seed')) {
      //   $this->call(UsersTableSeeder::class);
      //   $this->call(MealsTableSeeder::class);
      //   $this->call(BazarsTableSeeder::class);
      //   $this->call(DebitcreditsTableSeeder::class);
      //   $this->call(UserMonthsTableSeeder::class);
      // }


    }
  }
