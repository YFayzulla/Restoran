<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'parent_id' => fake()->numerify(),
            'image'=>fake()->text(),
        ];
    }
}
