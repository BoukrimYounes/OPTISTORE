<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $files = glob(public_path('storage/products/*/*.{jpg,jpeg,png,gif}'), GLOB_BRACE);
            $imageUrl = $files ? 'products/' . basename($this->faker->randomElement($files)) : 'products/default.jpg';
    
            return [
                'product_id' => Product::factory(),
                'image_url' => $imageUrl,
                'is_main' => $this->faker->boolean(20),
            ];
    }
}
