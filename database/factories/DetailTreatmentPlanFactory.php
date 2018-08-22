<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Detail_treatment_plan::class, function (Faker $faker) {
    return [
        'treatment_plan_id'         => rand(1,5),
        'tooth_id'                  => rand(1,5),
        'diagnosis_id'              => rand(1,5),
        'tooth_treatment_id'        => rand(1,5),
        'cost'                      => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'description'               => $faker->text($maxNbChars = 200),
    ];
});
