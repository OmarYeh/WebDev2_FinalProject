<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=>fake()->sentence(),
           'rating'=>fake()->numberBetween(1,5),
           'Content'=>fake()->realText($maxNbChars = 200, $indexSize = 2),
           'user_id'=>fake()->numberBetween(1,11),
           'store_id'=>fake()->numberBetween(1,7)
        ];
    }
}
