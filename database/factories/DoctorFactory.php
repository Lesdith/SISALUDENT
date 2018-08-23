<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Doctor::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'address'           => $faker->address,
        'specialty_id'      => rand(1,5),
    ];
});
