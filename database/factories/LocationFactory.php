<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Location::class, function (Faker $faker) {

    return [
        'name'              =>  $faker->city,
    ];
});
