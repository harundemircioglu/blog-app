<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'title 1',
                'description' => 'description 1'
            ],
            [
                'title' => 'title 2',
                'description' => 'description 2'
            ],
            [
                'title' => 'title 3',
                'description' => 'description 3'
            ],
            [
                'title' => 'title 4',
                'description' => 'description 4'
            ],
        ];

        foreach ($data as $category) {
            BlogCategory::firstOrCreate(['title' => $category['title']], ['description' => $category['description']]);
        }
    }
}
