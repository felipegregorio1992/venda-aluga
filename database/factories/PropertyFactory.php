<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->randomElement([
            'Cobertura duplex no Umarizal',
            'Casa de alto padrao no Umarizal',
            'Apartamento amplo no Nazare',
        ]);

        return [
            'code' => 'DV-'.fake()->unique()->numerify('####'),
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numerify('###'),
            'description' => fake()->paragraph(),
            'type' => fake()->randomElement(['casa', 'apartamento', 'cobertura']),
            'offer' => fake()->randomElement(['venda', 'aluguel']),
            'price' => fake()->numberBetween(800000, 2500000),
            'neighborhood' => 'Umarizal',
            'city' => 'Belem',
            'state' => 'PA',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => 180,
            'image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80',
            'featured' => false,
        ];
    }
}
