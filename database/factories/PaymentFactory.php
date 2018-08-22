<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Payment::class, function (Faker $faker) {
    return [
        'treatment_plan_id'          => rand(1,5),
        'date'                       => $faker->date($format = 'Y-m-d', $max = 'now'),
        'pay_debt'                   => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'balance_debt'               => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
    ];
});
