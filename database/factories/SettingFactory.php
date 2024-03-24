<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email'=> fake()->email(),
            'phone'=> fake()->phoneNumber(),
            'address' => fake()->address(),
            'description' => fake()->paragraph(),
            'facebook' => fake()->url(),
            'instgram' => fake()->url(),
            'linkedin' => fake()->url(),
            'twitter' => fake()->url(),
        ];
    }
}
