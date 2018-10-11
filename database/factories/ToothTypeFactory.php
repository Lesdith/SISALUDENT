<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_type::class, function (Faker $faker) {

    return [
        'name'              =>  $faker->word,
    ];
});
