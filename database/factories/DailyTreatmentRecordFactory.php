<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Daily_treatment_record::class, function (Faker $faker) {
    return [
        'treatment_plan_id' => rand(1,5),
        'doctor_id'         => rand(1,5),
        'total'             => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'pay_debt'          => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'payment_date'      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'balance_debt'      => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
    ];
});
