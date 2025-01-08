<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Teknologi', 'Kesehatan', 'Pendidikan', 'Entertaimen', 'Olahraga'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
