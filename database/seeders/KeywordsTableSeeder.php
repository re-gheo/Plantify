<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->insert([
            'keyword_name' => 'green',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'healthy',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'bloom',
            'isDeleted' => 0,
        ]);
    }
}
