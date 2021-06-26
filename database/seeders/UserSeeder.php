<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Retailer;
use Illuminate\Database\Seeder;
use App\Models\Retailer_application;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(14)->create()
            ->each(function ($user) {

                if ($user->user_role == "retailer") {

                    $store =  Store::factory()->create(['store_id' => $user->id]);
                    $application = $this->createApplication($user);
                    $retailers = Retailer::factory()->create([
                        "retailer_id" => $user->id,
                        "store_id" =>$user->id,
                        "retailer_address" => $user->address,
                        "retailer_postalcode" =>  1122,
                        "retailer_personincharge" =>  $user->first_name . ' ' . $user->last_name,
                        "retailer_idnumber" =>  $user->govtid_number,
                        "retailer_birthdate" =>  $user->birthday,
                        "retailer_city" => "Pasig",
                        "retailer_barangay" => "manila",
                        "retailer_region" => "NCR",

                    ]);
                    $this->createProduct($user);
                }
            });
    }
    public function createApplication($user)
    {
        $application = Retailer_application::factory()->create(
            [
                'retailer_personincharge' => $user->first_name . ' ' . $user->last_name,
                'retailer_birthdate' => $user->birthday,
                'user_id' => $user->id,
                'retailer_idnumber' => $user->govtid_number,
            ]
        );

        return   $application;
    }

    public function createRetailer($user, $application, $store)
    {
        $retailer = Retailer::factory()->create(
            [
                "retailer_id" => $user->id,
                "store_id" => $user->id,
                'retailer_personincharge' => $user->first_name . ' ' . $user->last_name,
                'retailer_birthdate' => $user->birthday,
                "retailer_address" =>  $application->retailer_address,
                "retailer_postalcode" =>   $application->retailer_postalcode,
                'retailer_idnumber' => $user->govtid_number,
                "retailer_birthdate" => $user->birthday,
                "retailer_city" => "Pasig",
                "retailer_barangay" => "manila",
                "retailer_region" => "NCR",

            ]
        );
        
        return $retailer;
    }

    public function createProduct($retailer)
    {
        $products = [];
        for ($i = 0; $i < 7; $i++) {
            if (rand(1, 10) > 2) {
                array_push($products, Product::factory()->create(['retailer_id' => $retailer->id]));
            }
        }

        return $products;
    }

    public function createPlantReference($user)
    {
        $application = Retailer_application::factory()->create(
            [
                'retailer_personincharge' => $user->first_name . ' ' . $user->last_name,
                'retailer_birthdate' => $user->birthday,
                'user_id' => $user->id,
                'retailer_idnumber' => $user->govtid_number,
            ]
        );

        return   $application;
    }
}
