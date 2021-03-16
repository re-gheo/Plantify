<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            "store_id" => 2,
            "store_name" => "Sari sari",
            "store_description" => "Something434343",
            "store_profileimage" => "store/IXNkbQodicDpWJ9TLxfQUsj2lQIPO6dLRUciGtfn.png",
            "store_backgroundimage" => "store/FYjuQYThwBNgBsnv8lvtr4Vnd7HBn5fY2Q2hpq5N.jpg",
            "store_phonenumber" => "639165149430",
            "store_dateregistererd" => "2021-02-21 22:26:49",
            "store_cardid" => null,
            "store_gcashnumber" => null,
            "store_codoption" => 0,
            "store_advertismentid" => null,
            "created_at" => "2021-02-21 22:26:49",
            "updated_at" => "2021-02-25 09:50:32",

        ]);
    }
}
