<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Tooth_position::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
        
    return [
        'name'  => $faker->title,
    ];
});
