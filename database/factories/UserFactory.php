<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Maker;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'username' => $this->faker->unique()->safeEmail(),
            'email' => $this->faker->unique()->email(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('Test1234'),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birth_date' => $this->faker->date('Y-m-d'),
            'phone_number' => $fakerPH->mobileNumber(),
            'address' => $fakerPH->municipality().', '.$fakerPH->province(),
            'image_path' => $fakerPH->picsum(public_path('img'), 640, 480, false),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
