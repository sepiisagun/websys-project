<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\{Factory, Generator};
use Mmo\Faker\LoremFacesProvider;
use Mmo\Faker\LoremSpaceProvider;
use Mmo\Faker\PicsumProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
            $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));
            $faker->addProvider(new \Mmo\Faker\LoremFacesProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
