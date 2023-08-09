<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\IngredientTranslation;

class IngredientTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'fr', 'es']; // Replace with your supported locales


        $ingredients = Ingredient::all();

        // Create translations for each tag in each locale
        foreach ($ingredients as $ingredient) {
            foreach ($locales as $locale) {
                $ingredient->translations()->create([
                    'locale' => $locale,
                    'title' => 'Translated Title for ' . $ingredient->slug . ' in ' . $locale,
                ]);
            }
        }
    }
}
