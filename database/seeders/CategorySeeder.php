<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Bar']);
        Category::create(['name' => 'Shirinliklar']);
        Category::create(['name' => 'Non va choy']);
        Category::create(['name' => 'Taomlar']);
    }
}
