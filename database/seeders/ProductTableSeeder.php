<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            "product_name" => "shovel",
            "product_description" => "this is shovel",
            "commission_id" => 3,
            "product_sizes" => null,
            "product_varieties" => null,
            "product_referencep" => null,
            "product_mainphoto" => Null,
            "product_referenceid" => null,
            "product_categoryid" => null,
            "product_price" => 150.50,
            "product_quantity" => 12,
            "retailer_id" => 2,
            "isDeleted" => 0,
            "isPlant" => 0,
            "created_at" => "2021-02-24 22:13:12",
            "updated_at" => "2021-02-24 22:13:12",
        ]);

        DB::table('products')->insert([
            "product_name" => "flower",
            "product_description" => "this is flower",
            "commission_id" => 1,
            "product_sizes" => 12.0,
            "product_varieties" => null,
            "product_referencep" => null,
            "product_mainphoto" => "product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg",
            "product_referenceid" => null,
            "product_categoryid" => null,
            "product_price" => 200.50,
            "product_quantity" => 123,
            "retailer_id" => 2,
            "isDeleted" => 0,
            "isPlant" => 0,
            "created_at" => "2021-02-26 07:12:57",
            "updated_at" => "2021-02-26 07:12:57",
        ]);
    }
}
