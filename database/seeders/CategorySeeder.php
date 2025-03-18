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
            ['name' => 'Men Sun glasses'],
            ['name' => 'Women Sun glasses'],
            ['name' => 'Men Eye glasses'],
            ['name' => 'Women Eye glasses'],
            ['name' => 'Accessories'],
        ]);
    }
}
