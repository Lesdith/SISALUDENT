<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_type::class, function (Faker $faker) {
    
    $title = $faker->unique()->sentence(5);    
    return [
        'name'  => $title,
    ];
});
