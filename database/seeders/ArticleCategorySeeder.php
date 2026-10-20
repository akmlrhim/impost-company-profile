<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Kategori artikel resmi proyek.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing'],
            ['name' => 'Event & Entertainment', 'slug' => 'event-entertainment'],
            ['name' => 'Pengadaan', 'slug' => 'pengadaan'],
            ['name' => 'Branding', 'slug' => 'branding'],
        ];

        foreach ($categories as $category) {
            ArticleCategory::create($category);
        }
    }
}
