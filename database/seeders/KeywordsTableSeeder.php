<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        DB::table('keywords')->insert([
            'keyword_name' => 'Red',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Exotic',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Pink',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Garden',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Flower',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Hybrid',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Ginkgo',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Herb',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Agriculture',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Leaf',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Moss',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Nectar',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Palm',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Pollen',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Prickle',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Parted Leaf',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Seed Pod',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Shrub',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Soil',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Seed',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Tap Root',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Trunk',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Vascular Plant',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Vine',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Xerophyte',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Whorled',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Weeded',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Sunlight',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'No Sunlight',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Seedling',
            'isDeleted' => 0,
        ]);

        DB::table('keywords')->insert([
            'keyword_name' => 'Spores',
            'isDeleted' => 0,
        ]);
    }
}
