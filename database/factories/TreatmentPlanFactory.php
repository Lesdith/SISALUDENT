<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Treatment_plan::class, function (Faker $faker) {
    return [
        'patient_id'            => $faker->randomDigitNotNull(), 
        'tooth_id'              => $faker->randomDigitNotNull(), 
        'diagnosis_id'          => $faker->randomDigitNotNull(), 
        'tooth_treatment_id'    => $faker->randomDigitNotNull(), 
        'description'           => $faker->text($maxNbChars = 200),
    ];
});
