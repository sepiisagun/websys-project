<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = Carbon::create($this->faker->dateTimeBetween('+2 weeks', '+5 months'))->toDateString();
        $end = Carbon::create($start)->addDay()->toDateString();
        return [
            'check_in' => $start,
            'check_out' => $end,
        ];
    }
}
