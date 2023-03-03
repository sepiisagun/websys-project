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
    public function definition()
    {
        return [
            'excerpt' => $this->faker->realText($maxNbChars=50, $indexSize=2),
            'remark'=> $this->faker->realText($maxNbChars=300, $indexSize=3),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
