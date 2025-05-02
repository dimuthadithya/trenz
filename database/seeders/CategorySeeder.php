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
        Category::create(['category_name' => 'Women']);
        Category::create(['category_name' => 'Men']);
        Category::create(['category_name' => 'Kids']);

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

        $women = Category::where('category_name', 'Women')->first();

        foreach ($womenSubcategories as $subcategory) {
            Category::create([
                'category_name' => $subcategory,
                'parent_category_id' => $women->id,
            ]);
        }

        // Subcategories under Men
        $menSubcategories = [
            'Casual Shirts',
            'Shirts',
            'TShirts',
            'Shorts',
            'Bottom',
            'Office Shirt',
            'Gents Kits'
        ];

        $men = Category::where('category_name', 'Men')->first();

        foreach ($menSubcategories as $subcategory) {
            Category::create([
                'category_name' => $subcategory,
                'parent_category_id' => $men->id,
            ]);
        }
    }
}
