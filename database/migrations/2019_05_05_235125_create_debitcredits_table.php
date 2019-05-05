<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitcreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debitcredits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('credit_to');
            $table->unsignedBigInteger('debit_to');
            $table->date('date');
            $table->integer('amount');
            $table->text('more_info')->nullable();
            $table->foreign('credit_to')->references('id')->on('users');
            $table->foreign('debit_to')->references('id')->on('users');
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
        Schema::dropIfExists('debitcredits');
    }
}
