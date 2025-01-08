<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Sample Article 1',
            'user_id' => 1,
            'category_id' => 1,
            'content' => 'This is the content of sample article 1.',
            'image' => 'sample1.jpg'
        ]);

        Article::create([
            'title' => 'Sample Article 2',
            'user_id' => 2,
            'category_id' => 2,
            'content' => 'This is the content of sample article 2.',
            'image' => 'sample2.jpg'
        ]);

        // Add more sample articles as needed
    }
}
