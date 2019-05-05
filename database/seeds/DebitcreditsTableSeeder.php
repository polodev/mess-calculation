<?php

use App\Debitcredit;
use App\Libraries\Helpers;
use Illuminate\Database\Seeder;

class DebitcreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // print_r(Helpers::debitcredits());
    	foreach (Helpers::debitcredits() as $debitcredit) {
    		Debitcredit::create($debitcredit);
    	}
    }
}
