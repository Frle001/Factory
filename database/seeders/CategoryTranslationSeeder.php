<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es']; // Replace with your supported locales


        $categories = Category::all();

        // Create translations for each tag in each locale
        foreach ($categories as $category) {
            foreach ($locales as $locale) {
                $category->translations()->create([
                    'locale' => $locale,
                    'title' => 'Translated Title for ' . $category->slug . ' in ' . $locale,
                ]);
            }
        }
    }
}
