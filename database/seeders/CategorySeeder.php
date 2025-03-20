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
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Mobile Development',
            'slug' =>'mobile-development'
        ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Data Science',
            'slug' => 'data-science'
        ]);
        Category::create([
            'name' => 'Digital Marketing',
            'slug' => 'digital-marketing'
        ]);
        Category::create([
            'name' => 'Game Development',
            'slug' => 'game-development'
        ]);
    }
}
