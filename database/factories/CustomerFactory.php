<?php

use App\Customer;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'email'  => $faker->unique()->safeEmail,
        'name'   => $faker->name,
        'street' => $faker->streetAddress,
        'city'   => $faker->city,
        'state'  => $faker->stateAbbr,
        'zip'    => $faker->postcode,
        'active' => (bool)$faker->numberBetween(0, 19), // set ~5% inactive
    ];
});
