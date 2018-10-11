<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_stage::class, function (Faker $faker) {

    return [
        'name'              =>  $faker->word,
    ];
});
