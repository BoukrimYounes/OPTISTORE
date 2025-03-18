<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['home', 'work', 'other']),
            'address1' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'state' => $this->faker->state(),
            'zipcode' => $this->faker->postcode(),
            'isMain' => $this->faker->boolean(),
            'country_code' => $this->faker->countryCode(),
            'user_id' => User::factory(),
        ];
    }
}
