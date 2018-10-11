<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_position::class, function (Faker $faker) {

    return [
        'name'              =>  $faker->word,
    ];
});
