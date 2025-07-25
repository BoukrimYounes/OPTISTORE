<?php

namespace Database\Seeders;

use App\Models\brand;
use App\Models\cartItem;
use App\Models\category;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\productImage;
use App\Models\User;
use App\Models\userAddress;
use Faker\Provider\ar_EG\Payment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        OrderItem::factory(10)->create();
        // Payment::factory(10)->create();
        userAddress::factory(10)->create();
       
        Order::factory(5)->create();
        // cartItem::factory(15)->create();
        brand::factory(20)->create();
       
        Product::factory()
            ->count(30)
            ->create()
            ->each(function ($product) {
                // Create product images for each product
                ProductImage::factory()->create([
                    'product_id' => $product->id
                ]);
            });
        Message::factory(20)->create();
    }
}
