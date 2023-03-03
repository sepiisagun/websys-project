<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\House;
use App\Models\Reservation;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $renters = User::factory(10)
                    ->create(['role' => 'RENTER']);

        foreach($renters as $renter) {
            $houses = House::factory(5)
                        ->create(['user_id' => $renter->id]);
                foreach($houses as $key=>$house) {
                    if ($key % 2 === 0) {
                        $faker = Factory::create();
                        $count = $faker->numberBetween(1, $house->capacity);
                        $amount = $count * $house->price;
                        $rentee = User::factory(1)
                                    ->create(['role' => 'RENTEE']);
                        $reservation = Reservation::factory(1)
                                        ->create([
                                            'amount' => $amount,
                                            'guest_count' => $count,
                                            'house_id' => $house->id,
                                            'user_id' => $rentee[0]->id,
                                        ]);
                        Rating::factory(1)
                            ->create([
                                'house_id' => $house->id,
                                'user_id' => $rentee[0]->id,
                                'reservation_id' => $reservation[0]->id,
                            ]);
                    }
                }
        }
    }
}
