<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Department::class, function (Faker $faker) {
    return [
        'name'              =>  $faker->city,
        'code'              => $faker->numberBetween($min = 01, $max = 1000),
    ];
});
