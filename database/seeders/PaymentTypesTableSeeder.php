<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'payment_type' => 'card',
        ]);

        DB::table('payment_types')->insert([
            'payment_type' => 'gcash',
        ]);
    }
}
