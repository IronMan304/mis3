<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'description' => 'IT Equipment'
        ]);
        Category::create([
            'description' => 'Office Supplies'
        ]);
        Category::create([
            'description' => 'Lab Equipment'
        ]);
        Category::create([
            'description' => 'Stationery'
        ]);
        Category::create([
            'description' => 'Books and Publications'
        ]);
        Category::create([
            'description' => 'Furniture'
        ]);
        Category::create([
            'description' => 'Sports Equipment'
        ]);
        Category::create([
            'description' => 'Art Supplies'
        ]);
        Category::create([
            'description' => 'Audio-Visual Equipment'
        ]);
        Category::create([
            'description' => 'Safety Gear'
        ]);
        Category::create([
            'description' => 'Musical Instruments'
        ]);
    }
}
