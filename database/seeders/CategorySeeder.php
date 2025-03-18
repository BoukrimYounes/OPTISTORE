<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::insert([
            ['name' => 'MenSunglasses'],
            ['name' => 'WomenSunglasses'],
            ['name' => 'MenEyeglasses'],
            ['name' => 'WOmenEyeglasses'],
            ['name' => 'Accessories'],
        ]);
    }
}
