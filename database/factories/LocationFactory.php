<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Location::class, function (Faker $faker) {
    return [
        'name'  => $faker->citySuffix,
    ];
});
