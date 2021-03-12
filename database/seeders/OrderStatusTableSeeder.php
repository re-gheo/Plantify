<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'order_status' => 'Awaiting Payment Gcash',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Awaiting Payment Card',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Completed',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Refunded(Partialy)',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Refunded',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Cancelled',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Failed',
        ]);

        DB::table('order_status')->insert([
            'order_status' => 'Expired',
        ]);

    }
}
