<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(10, 100),
            'merchant_id' => rand(1, 2),
            'product_id' => rand(1, 5),
            'rating' => rand(3, 5),
            'comment' =>  fake()->text(),
        ];
    }
}
