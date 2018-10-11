<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Diagnosis::class, function (Faker $faker) {

    return [
        'name'              =>  $faker->word,
    ];
});
