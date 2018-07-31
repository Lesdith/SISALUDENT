<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Specialty::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
        
        return [
            'name'  => $faker->title,
        ];
    });