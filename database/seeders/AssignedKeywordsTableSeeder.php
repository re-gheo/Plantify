<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignedKeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assigned_keywords')->insert([
            "product_id" => 1,
            "owned_keywordid" => 1,
            "created_at" => "2021-02-22 19:55:31",
            "updated_at" => "2021-02-22 19:55:31",
        ]);

        DB::table('assigned_keywords')->insert([
            "product_id" => 1,
            "owned_keywordid" => 2,
            "created_at" => "2021-02-22 19:55:31",
            "updated_at" => "2021-02-22 19:55:31",
        ]);

        DB::table('assigned_keywords')->insert([
            "product_id" => 2,
            "owned_keywordid" => 2,
            "created_at" => "2021-02-22 19:55:31",
            "updated_at" => "2021-02-22 19:55:31",
        ]);
    }
}
