<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commissions')->insert([
            'commission_id' => 1,
            'commissiontype' => 'Plant',
            'commissions_max_add' => '15',
            'commissions_max_percentage' => '0.05',
            'commissions_min' => '249',
            'commissions_min_add' => '25',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

        DB::table('commissions')->insert([
            'commission_id' => 2,
            'commissiontype' => 'Seed',
            'commissions_max_add' => '12',
            'commissions_max_percentage' => '0.04',
            'commissions_min' => '249',
            'commissions_min_add' => '22',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

        DB::table('commissions')->insert([
            'commission_id' => 3,
            'commissiontype' => 'Tools ,Soils and Pots',
            'commissions_max_add' => '12',
            'commissions_max_percentage' => '0.04',
            'commissions_min' => '249',
            'commissions_min_add' => '22',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

        DB::table('commissions')->insert([
            'commission_id' => 4,
            'commissiontype' => 'Device And Machine',
            'commissions_max_add' => '12',
            'commissions_max_percentage' => '0.04',
            'commissions_min' => '249',
            'commissions_min_add' => '22',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

        DB::table('commissions')->insert([
            'commission_id' => 5,
            'commissiontype' => 'Chemical and natural Products',
            'commissions_max_add' => '15',
            'commissions_max_percentage' => '0.05',
            'commissions_min' => '249',
            'commissions_min_add' => '25',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

        DB::table('commissions')->insert([
            'commission_id' => 6,
            'commissiontype' => 'Ornaments',
            'commissions_max_add' => '12',
            'commissions_max_percentage' => '0.04',
            'commissions_min' => '249',
            'commissions_min_add' => '22',
            'isDeleted' => '0',
            'created_at' => '2021-02-20 21:17:45',
            'updated_at' => '2021-02-20 21:17:45',
        ]);

    }
}
