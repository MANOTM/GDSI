<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\marche>
 */
class marcheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => rand(1,1000),
            'type' => fake()->name(),
            'date' => now(),
            'objet' => fake()->text(15),
            'annee' => rand(2000,2050),
            'montant' => rand(1,5000),
            'entreprise' => fake()->name()
        ];
    }
}
