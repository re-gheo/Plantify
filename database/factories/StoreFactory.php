<?php

namespace Database\Factories;

use App\Models\Retailer_application;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "store_name" => $d = ucfirst($this->faker->unique()->word) . " Store",
            "store_description" => "This is a description of " . $d ,
            "store_profileimage" => "store/IXNkbQodicDpWJ9TLxfQUsj2lQIPO6dLRUciGtfn.png",
            "store_backgroundimage" => "store/FYjuQYThwBNgBsnv8lvtr4Vnd7HBn5fY2Q2hpq5N.jpg",
            "store_phonenumber" => "639165149430",
            "store_dateregistererd" => Carbon::now('Asia/Manila'),
            "store_cardid" => null,
            "store_gcashnumber" => null,
            "store_codoption" => 0,
            "store_advertismentid" => null,
        ];
    }
  
}
