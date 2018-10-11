<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Gender::class, function (Faker $faker) {


    return [
        'name'              =>  $faker->word,
    ];
});
