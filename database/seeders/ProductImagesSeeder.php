<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        $totalProducts = 21;
        $images = [];

        for ($productId = 1; $productId <= $totalProducts; $productId++) {
            // Determine folder by gender
            $folder = $productId <= 7 ? 'Men' : 'Women';

            for ($i = 1; $i <= 4; $i++) {
                $imageFileName = "product_{$productId}_{$i}.jpg";

                $images[] = [
                    'product_id' => $productId,
                    'image_path' => "uploads/products/{$folder}/{$imageFileName}",
                    'image_name' => $imageFileName,
                    'image_type' => 'gallery',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('product_images')->insert($images);
    }
}
