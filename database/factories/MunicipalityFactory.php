<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Municipality::class, function (Faker $faker) {
       
    return [
        'name'             => $faker->city,
        'code'             => $faker->numberBetween($min = 01, $max = 1000),
        'department_id'    => rand(1,5),    
    ];
});
