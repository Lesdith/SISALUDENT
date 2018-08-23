<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Service::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
    return [
        'name'  => $title,
    ];
});