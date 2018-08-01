<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Diagnosis::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
    return [
        'name'  => $title,
    ];
});
