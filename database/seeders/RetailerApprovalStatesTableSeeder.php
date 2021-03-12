<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RetailerApprovalStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retailer_approvalstates')->insert([
            'retailer_approvalstateid' => 1,
            'retailer_approvalstate' => 'Approved',
        ]);

        DB::table('retailer_approvalstates')->insert([
            'retailer_approvalstateid' => 2,
            'retailer_approvalstate' => 'Denied',
        ]);

        DB::table('retailer_approvalstates')->insert([
            'retailer_approvalstateid' => 3,
            'retailer_approvalstate' => 'Pending',
        ]);
    }
}
