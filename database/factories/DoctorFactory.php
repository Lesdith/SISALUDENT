<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Doctor::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName($gender = null|'male'|'female'),
        'last_name'         => $faker->lastName,
        'address'           => $faker->address,
        'specialty_id'      => $faker->randomDigitNotNull(),
    ];
});
