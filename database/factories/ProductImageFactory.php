<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
    public function definition()
    {
        $product = Product::inRandomOrder()->first();

        // Ensure the product has a category
        if (!$product || !$product->category) {
            return [
                'product_id' => $product ? $product->id : null,
                'image_url' => null
            ];
        }
        $categoryName = str_replace(' ', '_', $product->category->name);
        // Define the folder based on category name
        $folder = 'products/' . $categoryName . '/';

        // Get all image files from the category folder
        $files = Storage::disk('public')->files($folder);

        // Pick a random image file, or set null if no images exist
        $randomImage = count($files) > 0 ? $files[array_rand($files)] : null;

        return [
            'product_id' => $product->id,
            'image_url' => $randomImage, // Store only the relative path
        ];
    }
    
}
