<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Treatment_plan::class, function (Faker $faker) {
    return [
        'patient_id'            => rand(1,5), 
        'start_date'            => $faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date'              => $faker->date($format = 'Y-m-d', $max = 'now'),
        'subtotal'                      => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'discount'                      => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'total'                      => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
    ];
});
