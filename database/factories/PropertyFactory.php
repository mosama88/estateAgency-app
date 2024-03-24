<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->name(),
            'address'=> fake()->address(),
            'price' => fake()->numberBetween($min = 10000, $max = 2000000), // Adjust the range as per your requirements
            'floor' => fake()->numberBetween(1, 7 ),
            'details' => fake()->paragraph(),
            'hall' => fake()->numberBetween(1, 3 ),
            'space' => fake()->numberBetween(130, 250 ),
            'room' => fake()->numberBetween( 3, 4),
            'Baths' => fake()->numberBetween(1, 2),
            'Kitchen' => fake()->numberBetween(1, 2),
            'image_1' => fake()->image(),
            'image_2' => fake()->image(),
            'image_3' => fake()->image(),
            'status' => fake()->randomElement(['rent', 'sell']),
            'type' => fake()->randomElement(['villa', 'Apartment']),
            'project_id' => \App\Models\Project::factory()->create()->id,
            'user_id' => \App\Models\Project::factory()->create()->id,
        ];
    }
}



// 'details',
// 'hall',
// 'space',
// 'room',
// 'Baths',
// 'Kitchen',
// 'image_1',
// 'image_2',
// 'image_3',
// 'type',
// 'status',
// 'project_id',
