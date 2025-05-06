<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productsMenSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Casual Shirts (category_id = 27)
            [
                'name' => "Men's Double Pocket Long Sleeve Shirt",
                'slug' => Str::slug("Men's Double Pocket Long Sleeve Shirt"),
                'description' => "This men's long-sleeve shirt features two convenient pockets...",
                'price' => 3660.00,
                'stock' => 10,
                'image' => 'uploads/products/Men/double_pocket.jpg',
                'category_id' => 27,
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "White Print Cotton Shirt",
                'slug' => Str::slug("White Print Cotton Shirt"),
                'description' => "A classic staple, breathable and lightweight fabric...",
                'price' => 3760.00,
                'stock' => 12,
                'image' => 'uploads/products/Men/white_print.jpg',
                'category_id' => 27,
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "In-Formal Full Sleeve Casual Shirt",
                'slug' => Str::slug("In-Formal Full Sleeve Casual Shirt"),
                'description' => "Effortlessly stylish and comfortable...",
                'price' => 4995.00,
                'stock' => 8,
                'image' => 'uploads/products/Men/informal_shirt.jpg',
                'category_id' => 27,
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Beige Checkered Collar Shirt",
                'slug' => Str::slug("Beige Checkered Collar Shirt"),
                'description' => "Classic and versatile with subtle check pattern...",
                'price' => 3890.00,
                'stock' => 6,
                'image' => 'uploads/products/Men/beige_checkered.jpg',
                'category_id' => 27,
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Shirts (category_id = 28)
            [
                'name' => "Men Formal Full Sleeve Plain Shirt",
                'slug' => Str::slug("Men Formal Full Sleeve Plain Shirt"),
                'description' => "A classic wardrobe essential with a tailored fit...",
                'price' => 3695.00,
                'stock' => 5,
                'image' => 'uploads/products/Men/formal_plain.jpg',
                'category_id' => 28,
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Men Slim Fit Formal Shirt",
                'slug' => Str::slug("Men Slim Fit Formal Shirt"),
                'description' => "Tailored for a sharp, modern look...",
                'price' => 4095.00,
                'stock' => 7,
                'image' => 'uploads/products/Men/slim_fit.jpg',
                'category_id' => 28,
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // TShirts (category_id = 29)
            [
                'name' => "DKDC Pink Short Sleeve Tshirt",
                'slug' => Str::slug("DKDC Pink Short Sleeve Tshirt"),
                'description' => "Stay effortlessly chic in this pink short sleeve t-shirt...",
                'price' => 2295.00,
                'stock' => 20,
                'image' => 'uploads/products/Men/dkdc_pink.jpg',
                'category_id' => 29,
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
