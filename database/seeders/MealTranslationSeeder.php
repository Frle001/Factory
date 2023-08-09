<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\MealTranslation;

class MealTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es']; // Replace with your supported locales

        // Get all tags created by TagSeeder
        $meals = Meal::all();

        // Create translations for each tag in each locale
        foreach ($meals as $meal) {
            foreach ($locales as $locale) {
                $meal->translations()->create([
                    'locale' => $locale,
                    'title' => 'Translated Title for meal ' . $meal->id . ' in ' . $locale,
                    'description' => 'Translated Description for meal ' . $meal->id . ' in ' . $locale,
                ]);
            }
        }
    }
}
