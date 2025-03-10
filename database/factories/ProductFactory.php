<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => Str::slug($this->faker->unique()->words(2, true)),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 10, 500), // Price between 10 and 500
            'stock' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(640, 480, 'fashion', true),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
