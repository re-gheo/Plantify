<?php

namespace Database\Factories;

use App\Models\Retailer_application;
use Illuminate\Database\Eloquent\Factories\Factory;

class Retailer_applicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Retailer_application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            // 'retailer_applicationid',
            'retailer_address' => $this->faker->address,
            'retailer_postalcode' => $this ->faker->postcode,
            // 'retailer_personincharge',
            'retailer_officialidfront' => null,
            'retailer_officialidback' => null,
            // 'retailer_idnumber',
            // 'retailer_birthdate',
            'retailer_city' => $this ->faker->city,
            'retailer_barangay'=> $this->faker->streetName,
            'retailer_region'=> "NCR",
            'retailer_approvalstateid'=> 1,
            // 'user_id',
            'deny_reason' =>null,
        ];
    }
}