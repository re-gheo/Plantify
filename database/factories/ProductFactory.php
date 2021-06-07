<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $normal = [
            "product_name" => $d = ucfirst($this->faker->unique()->word) . ' TOOL',
            "product_description" => "this the description for this ". $d ." tool/something",
            "commission_id" => 3,
            "product_sizes" => null,
            "product_varieties" => null,
            "product_referencep" => null,
            "product_mainphoto" => Null,
            "product_referenceid" => null,
            "product_categoryid" => null,
            "product_price" => 150.50,
            "product_quantity" => 12,
            // "retailer_id" => 2,
            "isDeleted" => 0,
            "isPlant" => 0,
        ];

        $plant = [
            "product_name" => $d = ucfirst($this->faker->unique()->word) . ' PLANT',
            "product_description" => "this the description for this  ". $d ." plant",
            "commission_id" => 1,
            "product_sizes" => 12.0,
            "product_varieties" => null,
            "product_referencep" => null,
            "product_mainphoto" => "product_photo/Nz236qySSeLb5iTJBXtKrcdF4ABZcA6bcWcrCk9Y.jpg",
            "product_referenceid" => null,
            "product_categoryid" => null,
            "product_price" => 200.50,
            "product_quantity" => 123,
            // "retailer_id" => 2,
            "isDeleted" => 0,
            "isPlant" => 1,
        ];


        $type = [$normal,  $plant];

        return  $type[array_rand($type, 1)];
    }
}
