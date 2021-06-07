<?php

namespace Database\Seeders;

use App\Models\Assigned_keywords;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RetailerApprovalStatesTableSeeder::class,
            UserStatesTableSeeder::class,
            UserTableSeeder::class,
            CommissionsTableSeeder::class,
            KeywordsTableSeeder::class,
            CardTypesTableSeeder::class,
            PaymentTypesTableSeeder::class,
            OrderStatusTableSeeder::class,
            StoreTableSeeder::class,
            RetailerTableSeeder::class,
            ProductTableSeeder::class,
            AssignedKeywordsTableSeeder::class,
            UserSeeder::class,
        ]);


    }
}
