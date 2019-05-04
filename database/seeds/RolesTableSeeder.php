<?php

use App\Libraries\Helpers;
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach (Helpers::roles as $role) {

        Role::create([
          'id' => $role['id'],
          'name' => $role['name'],
          'slug' => str_slug($role['name']),
        ]);

      }
    }
}
