<?php

namespace Database\Factories;

use App\Models\Retailer;
use Illuminate\Database\Eloquent\Factories\Factory;

class RetailerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Retailer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            // "retailer_id" => 2,
            // "store_id" => 2,
            "computed_ratings" => null,
            "ratings_id" => null,
            // "retailer_address" => "Dynasty Furniture Gallery 6153 South Super Highway",
            // "retailer_postalcode" =>  1122,
            // "retailer_personincharge" => "Fretailer Lretailer",
            "retailer_officialidfront" =>  null,
            "retailer_officialidback" => null,
            // "retailer_idnumber" => 312313,
            // "retailer_birthdate" => "1998-10-20",
            // "retailer_city" => "Pasig",
            // "retailer_barangay" => "manila",
            // "retailer_region" => "NCR",
        ];
    }
}
