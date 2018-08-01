<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Municipality::class, function (Faker $faker) {
       
    return [
        'name'             => $faker->name,
        'department_id'    => rand(1,5),    
    ];
});
