<?php

namespace Database\Factories;

use App\Models\DangerLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DangerLevel>
 */
class DangerLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake(),
            'color' => fake(),
            'order' => rand(1, 10),
        ];
    }
}
