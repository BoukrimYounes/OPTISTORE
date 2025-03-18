<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(),
            'published' => $this->faker->boolean(),
            'inStock' => $this->faker->boolean(),
            'price' => $this->faker->randomFloat(2, 5, 1000),
            'color' => $this->faker->colorName(),
            'created_by' => User::factory(),
            'updated_by' => User::factory(),
            'brand_id' => Brand::factory(),
            'category_id' => $this->faker->randomElement($categoryIds),
            'deleted_by' => null,
        ];
    }
}
