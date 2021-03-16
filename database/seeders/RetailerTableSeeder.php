<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RetailerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retailers')->insert(
            //Retailer
            [
                "retailer_id" => 2,
                "store_id" => 2,
                "computed_ratings" => null,
                "ratings_id" => null,
                "retailer_address" => "Dynasty Furniture Gallery 6153 South Super Highway",
                "retailer_postalcode" =>  1122,
                "retailer_personincharge" => "Fretailer Lretailer",
                "retailer_officialidfront" =>  null,
                "retailer_officialidback" => null,
                "retailer_idnumber" => 312313,
                "retailer_birthdate" => "1998-10-20",
                "retailer_city" => "Pasig",
                "retailer_barangay" => "manila",
                "retailer_region" => "NCR",
                "created_at" => "2021-02-21 22:26:49",
                "updated_at" => "2021-02-21 22:26:49"
           ],
       );
    }
}
