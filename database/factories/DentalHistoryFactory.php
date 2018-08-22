<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Dental_history::class, function (Faker $faker) {

    $title = $faker->unique()->sentence(5);
    return [
        'patient_id'                        => rand(1,5),  
        'last_medical_visit_date'           => $faker->date($format = 'Y-m-d', $max = 'now'),
        'dental_hemorrhage'                 => true,
        'mouth_infections'                  => true,
        'mouth_ulcers'                      => true,
        'reaction_anesthesia'               => true,
        'what_reaction'                     => $title,
        'toothache'                         => true,
    ];
});
