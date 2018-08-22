<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Tooth_treatment::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);      
    return [
        'name'          => $title,
        'cost'          => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'service_id'    => rand(1,5), 
    ];
});
