<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $admin = [
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => $f = $this->faker->firstName,
            'last_name' => $l = $this->faker->lastName,
            'name' => $f . ' ' . $l,
            'remember_token' => Str::random(10),
            'user_stateid' => 1,
            'user_role' => 'admin',
        ];

        $retailer = [
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => $f = $this->faker->firstName,
            'last_name' => $l = $this->faker->lastName,
            'name' => $f . ' ' . $l,
            'address' => $this->faker->address,
            'govtid_number' => '{"type":"SSS","no":"11702288"}',
            'cp_number' => $this->faker->numerify('###########'),
            'region' => "NCR",
            'birthday' => $this->faker->dateTimeBetween('-30 years',  '-19 years'),
            'otp_verified' => 1,
            'remember_token' => Str::random(10),
            'user_stateid' => 1,
            'retailer_approvalstateid' => 1,
            'user_role' => 'retailer',
        ];

        $customer = [
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => $f = $this->faker->firstName,
            'last_name' => $l = $this->faker->lastName,
            'name' => $f . ' ' . $l,
            'region' => "NCR",
            'remember_token' => Str::random(10),
            'user_stateid' => 1,
            'user_role' => 'customer',
        ];

        $customer2 = [
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => $f = $this->faker->firstName,
            'last_name' => $l = $this->faker->lastName,
            'name' => $f . ' ' . $l,
            'address' => $this->faker->address,
            'govtid_number' => '{"type":"SSS","no":"11702288"}',
            'cp_number' => $this->faker->numerify('###########'),
            'region' => "NCR",
            'birthday' => $this->faker->dateTimeBetween('-30 years',  '-19 years'),
            'otp_verified' => 1,
            'remember_token' => Str::random(10),
            'user_stateid' => 1,
            'user_role' => 'customer',
        ];

        $role = [$admin, $retailer, $customer, $customer2];
        
        return $role[array_rand($role, 1 )];
    }
}
