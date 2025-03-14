<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // Child Categories
        Category::create(['category_name' => 'Pants', 'parent_category_id' => $women->id]);
        Category::create(['category_name' => 'Shirts', 'parent_category_id' => $women->id]);
        Category::create(['category_name' => 'Blouses', 'parent_category_id' => $women->id]);
        Category::create(['category_name' => 'Dresses', 'parent_category_id' => $women->id]);
        Category::create(['category_name' => 'Shoes', 'parent_category_id' => $women->id]);

        Category::create(['category_name' => 'Jeans', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'T-Shirts', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'Hoodies', 'parent_category_id' => $men->id]);
        Category::create(['category_name' => 'Sneakers', 'parent_category_id' => $men->id]);

        Category::create(['category_name' => 'Shorts', 'parent_category_id' => $kids->id]);
        Category::create(['category_name' => 'Sweatpants', 'parent_category_id' => $kids->id]);
    }
}
