<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
            'session_id' => $this->faker->uuid(),
            'user_address_id' => UserAddress::factory(),
            'created_by' => User::factory(),
            'updated_by' => User::factory(),
        ];
    }
}
