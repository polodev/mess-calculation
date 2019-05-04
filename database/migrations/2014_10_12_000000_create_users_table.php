<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /**
       *
      1 developer
      2 admin
      3 employee
      4 agent
      5 customer
     */
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('slug')->unique();
            $table->bigInteger('role_id')->unsigned()->default(3);
            $table->string('email')->unique();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('others')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();


            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('voter_id_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('date_of_birth')->nullable();

            $table->rememberToken();
            $table->foreign('role_id')
              ->references('id')->on('roles');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
