<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            //Admin
            [
                'email' => 'admin@plantify.com',
                'password' => Hash::make('password'),
                'user_role' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'Test',
                'name' => 'Admin Test',
            ],
        );

        DB::table('users')->insert(
             //Retailer
             [
                'email' => 'retailer@plantify.com',
                'password' => Hash::make('password'),
                'user_role' => 'retailer',
                'first_name' => 'Retailer',
                'last_name' => 'Test',
                'name' => 'Retailer Test',
                'address' => '1077 Stanley St.',
                'govtid_number' => '{"type":"SSS","no":"11702288"}',
                'cp_number' => '639165149430',
                'region' => 'National Capital Region (NCR)',
                'birthday' => '1998-10-20',
                'retailer_approvalstateid'=> null
            ],
        );

        DB::table('users')->insert(
            //Customer
            [
                'email' => 'customer@plantify.com',
                'password' => Hash::make('password'),
                'user_role' => 'customer',
                'first_name' => 'Customer',
                'last_name' => 'Test',
                'name' => 'Customer Test',
                'address' => '007 Bond St.',
                'govtid_number' => '{"type":"SSS","no":"11702288"}',
                'cp_number' => '639165149430',
                'region' => 'National Capital Region (NCR)',
                'birthday' => '1998-10-20',
                'retailer_approvalstateid'=> null
            ],

        );
    }
}
