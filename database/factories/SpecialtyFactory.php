<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Specialty::class, function (Faker $faker) {
        
    $title = $faker->unique()->sentence(5);
        return [
            'name'  => $title,
        ];
    });