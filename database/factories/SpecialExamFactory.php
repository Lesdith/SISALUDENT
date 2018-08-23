<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Special_exam::class, function (Faker $faker) {
    return [
        'treatment_plan_id' => rand(1,5),
        'tooth_id'          => rand(1,5),
        'image'             => $faker->imageUrl($width = 640, $height = 480),
        'cost'              => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'total'             => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
    ];
});
