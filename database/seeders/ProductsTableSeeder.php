<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Jersey
            [
                'name' => "Women Zip Up Sweater Hoodie Long Sleeve Cropped Lined Slim Fit Jacket",
                'slug' => Str::slug("Women Zip Up Sweater Hoodie Long Sleeve Cropped Lined Slim Fit Jacket"),
                'description' => "Stay stylish and cozy with this women's zip-up sweater hoodie...",
                'price' => 5695.00,
                'stock' => 15,
                'image' => "uploads/products/Women/zip_hoodie.jpg",
                'category_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Essence Women's Sleeve and Hem Long Sleeve Jacket",
                'slug' => Str::slug("Essence Women's Sleeve and Hem Long Sleeve Jacket"),
                'description' => "Stay warm and stylish with the Essence Women's Sleeve and Hem Long Sleeve Jacket...",
                'price' => 5895.00,
                'stock' => 12,
                'image' => "uploads/products/Women/essence_jacket.jpg",
                'category_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // TShirts
            [
                'name' => "Women's Ewe Beauty T-Shirt",
                'slug' => Str::slug("Women's Ewe Beauty T-Shirt"),
                'description' => "Soft, stylish, and subtly sheep-tastic! Perfect for everyday wear.",
                'price' => 1550.00,
                'stock' => 25,
                'image' => "uploads/products/Women/ewe_beauty.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's Cardigan plain Tshirt",
                'slug' => Str::slug("Women's Cardigan plain Tshirt"),
                'description' => "Effortlessly chic, this cardigan and plain t-shirt set is perfect for everyday wear.",
                'price' => 1795.00,
                'stock' => 20,
                'image' => "uploads/products/Women/cardigan_set.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Roll Up Sleeve Black Line Tshirt",
                'slug' => Str::slug("Roll Up Sleeve Black Line Tshirt"),
                'description' => "Sleek and stylish with a clean black line detail. Great for casual or night wear.",
                'price' => 1595.00,
                'stock' => 18,
                'image' => "uploads/products/Women/black_line.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's Black Sleeveless Cropped Top",
                'slug' => Str::slug("Women's Black Sleeveless Cropped Top"),
                'description' => "Versatile design complements any outfit. Soft fabric and flattering fit.",
                'price' => 1395.00,
                'stock' => 22,
                'image' => "uploads/products/Women/black_cropped.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's Letter Mock Neck T-Shirt",
                'slug' => Str::slug("Women's Letter Mock Neck T-Shirt"),
                'description' => "Stylish mock neck and unique letter detail. Adds personality to your wardrobe.",
                'price' => 1595.00,
                'stock' => 17,
                'image' => "uploads/products/Women/mock_neck.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's V Neck Button Top Tshirt",
                'slug' => Str::slug("Women's V Neck Button Top Tshirt"),
                'description' => "Classic and chic V-neck with button detail. Versatile and comfortable.",
                'price' => 2995.00,
                'stock' => 14,
                'image' => "uploads/products/Women/vneck_button.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women Round Neck Solid T-Shirt",
                'slug' => Str::slug("Women Round Neck Solid T-Shirt"),
                'description' => "Classic and versatile round neck tee made from soft fabric.",
                'price' => 1495.00,
                'stock' => 26,
                'image' => "uploads/products/Women/solid_round.jpg",
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Crop Top
            [
                'name' => "Casual Solid Women Frill Sleeve Top",
                'slug' => Str::slug("Casual Solid Women Frill Sleeve Top"),
                'description' => "Charming frill sleeves with a clean solid design. Chic and comfy.",
                'price' => 1195.00,
                'stock' => 20,
                'image' => "uploads/products/Women/frill_top.jpg",
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women White Long Sleeve Tee",
                'slug' => Str::slug("Women White Long Sleeve Tee"),
                'description' => "Classic and versatile long sleeve tee in soft cotton.",
                'price' => 1495.00,
                'stock' => 19,
                'image' => "uploads/products/Women/white_long.jpg",
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women Halter Slim Tight Sexy Crop Top",
                'slug' => Str::slug("Women Halter Slim Tight Sexy Crop Top"),
                'description' => "Flattering halter design with stretch fabric. Great for night outs.",
                'price' => 1995.00,
                'stock' => 12,
                'image' => "uploads/products/Women/sexy_crop.jpg",
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's Casual Solid Purple Top",
                'slug' => Str::slug("Women's Casual Solid Purple Top"),
                'description' => "Soft, comfortable fabric with a flattering casual fit.",
                'price' => 1250.00,
                'stock' => 15,
                'image' => "uploads/products/Women/purple_top.jpg",
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "Women's Bow-Detail Strappy Crop Top",
                'slug' => Str::slug("Women's Bow-Detail Strappy Crop Top"),
                'description' => "Flattering crop top with bow and straps. Lightweight and breezy.",
                'price' => 1250.00,
                'stock' => 18,
                'image' => "uploads/products/Women/bow_strappy.jpg",
                'category_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
