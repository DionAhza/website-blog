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
        //Category::factory(5)->create();
        Category::create([
            'name'=>'web-genre',
            'slug'=>'web-design',
            'color'=>'red',
        ]);
        Category::create([
            'name'=>'web-drama',
            'slug'=>'web-dorama',
            'color'=>'green'
        ]);
        Category::create([
            'name'=>'web-thiller',
            'slug'=>'web-tiller',
            'color'=>'yellow'
        ]);
    }
}
