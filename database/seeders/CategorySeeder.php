<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $women = Category::create(['category_name' => 'Women']);
        $men = Category::create(['category_name' => 'Men']);
        $kids = Category::create(['category_name' => 'Kids']);

        // Subcategories under Women
        $womenSubcategories = [
            'Jersey',
            'TShirts',
            'Crop Top',
            'Jackets',
            'Kits',
            'Romper',
            'Skirt',
            'Pant',
            'Cargo Pant',
            'Denim',
            'Hoddie Top',
            'Dungaree',
            'Dresses',
            'Tops',
            'Frocks',
            'Jumpsuits',
            'Skinny',
            'Shirt',
            'Office Wear',
            'Party Wear',
            'Pinapo',
            'Blouse',
            'Shorts'
        ];

        foreach ($womenSubcategories as $subcategory) {
            Category::create([
                'category_name' => $subcategory,
                'parent_category_id' => $women->id,
            ]);
        }

        // Existing subcategories under Men
        Category::create(['category_name' => 'Jeans', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'T-Shirts', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'Hoodies', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'Sneakers', 'parent_category_id' => $men->id]);

        // Existing subcategories under Kids
        Category::create(['category_name' => 'Shorts', 'parent_category_id' => $kids->id]);
        Category::create(['category_name' => 'Sweatpants', 'parent_category_id' => $kids->id]);
    }
}
