<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_types')->insert([
            'card_type' => 'American Express',
        ]);

        DB::table('card_types')->insert([
            'card_type' => 'Diners Club',
        ]);

        DB::table('card_types')->insert([
            'card_type' => 'Discover',
        ]);

        DB::table('card_types')->insert([
            'card_type' => 'JCB',
        ]);

        DB::table('card_types')->insert([
            'card_type' => 'MasterCard',
        ]);

        DB::table('card_types')->insert([
            'card_type' => 'Visa',
        ]);
    }
}
