<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 8; $i++) {
            Product::create([
                'name' => 'Merch ' . $i,
                'description' => 'Description for Merch ' . $i,
                'price' => rand(20, 100), // Random price between 20 and 100
                'image' => '/images/merch' . $i . '.jpg', // Placeholder image path
            ]);
        }
    }
}

