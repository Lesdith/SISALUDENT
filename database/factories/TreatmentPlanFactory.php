<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Treatment_plan::class, function (Faker $faker) {
    return [
        'patient_id'            => rand(1,5), 
        'tooth_id'              => rand(1,5), 
        'diagnosis_id'          => rand(1,5), 
        'tooth_treatment_id'    => rand(1,5), 
        'description'           => $faker->text($maxNbChars = 200),
    ];
});
