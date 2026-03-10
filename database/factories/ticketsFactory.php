<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tickets>
 */
class ticketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4), // Random 4-word sentence
            'description' => fake()->paragraph(), // Random paragraph
            'priority' => fake()->randomElement(['low', 'medium', 'high', 'emergency']),
            'status' => 'open',
            'user_id' => \App\Models\User::all()->random()->id, // Picks a random existing user
        ];
    }
}
