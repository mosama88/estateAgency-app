<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence($nbWords = 2, $variableNbWords = true),
            'location' => fake()->address(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(3),
            'image' => fake()->image(),
            'user_id' =>\App\Models\User::factory()->create()->id,


        ];
    }
}




