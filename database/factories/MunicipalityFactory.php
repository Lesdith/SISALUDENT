<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Municipality::class, function (Faker $faker) {
    return [
        'name'             => $faker->city,
        'department_id'    => $faker->randomDigitNotNull(),    
    ];
});
