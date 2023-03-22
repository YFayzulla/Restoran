<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_uz' => fake()->name(),
            'name_ru' => fake()->name(),
            'name_en' => fake()->name(),
            'desc_uz' => fake()->name(),
            'desc_ru' => fake()->name(),
            'desc_en' => fake()->name(),
            'category_id' => fake()->numberBetween(1,Category::count()),
            'image'=>fake()->text(),
        ];
    }
}
