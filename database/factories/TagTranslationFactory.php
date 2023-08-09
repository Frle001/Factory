<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagTranslation>
 */
class TagTranslationFactory extends Factory
{
    //protected $model = TagTranslation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale' => $faker->randomElement(['en', 'fr','es']),
            'title' => $faker->sentence,
        ];
    }
}
