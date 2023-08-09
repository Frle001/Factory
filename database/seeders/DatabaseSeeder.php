<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TagSeeder::class]);
        $this->call([TagTranslationSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([CategoryTranslationSeeder::class]);
        $this->call([IngredientSeeder::class]);
        $this->call([IngredientTranslationSeeder::class]);
        $this->call([LanguagesTableData::class]);
        $this->call([MealSeeder::class]);
        $this->call([MealTranslationSeeder::class]);
        $this->call([MealIngredientSeeder::class]);
        $this->call([MealTagSeeder::class]);
    }
}
