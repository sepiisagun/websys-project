<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Maker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakerPH = Maker::create('en_PH');
        $fakerPH->addProvider(new \Mmo\Faker\PicsumProvider($fakerPH));
        return [
            'name' => $fakerPH->streetName() . ' ' . $fakerPH->streetSuffix(),
            'description' => $this->faker->realText($maxNbChars = 100),
            'address' => $fakerPH->municipality() . ', ' . $fakerPH->province(),
            'capacity' => $this->faker->numberBetween(8, 15),
            'price' => $this->faker->regexify('[1-9]{1}[0-9]{1}[0]{2}'),
            'image_path' => $fakerPH->picsum(public_path('img'), 640, 480, false),
        ];
    }
}
