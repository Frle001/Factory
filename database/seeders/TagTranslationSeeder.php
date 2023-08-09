<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\TagTranslation;

class TagTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es']; // Replace with your supported locales

        // Get all tags created by TagSeeder
        $tags = Tag::all();

        // Create translations for each tag in each locale
        foreach ($tags as $tag) {
            foreach ($locales as $locale) {
                $tag->translations()->create([
                    'locale' => $locale,
                    'title' => 'Translated Title for ' . $tag->slug . ' in ' . $locale,
                ]);
            }
        }
    }
}
