<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'type' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']),
            'created_by' => User::factory(),
            'updated_by' => User::factory()
        ];
    }
}
