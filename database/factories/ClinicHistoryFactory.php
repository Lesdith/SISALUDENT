<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Clinic_history::class, function (Faker $faker) {
    
    $title = $faker->unique()->sentence(5);

    return [
        'patient_id'                            => rand(1,5),
        'infectious_disease'                    => true,
        'disease_name'                          => $title,
        'cardiac'                               => true,
        'allergic'                              => true,
        'what_you_allergy'                      => $title,                   
        'diabetic'                              => true,
        'pregnant'                              => true,
        'epileptic'                             => true,
        'observations'                          => $faker->text($maxNbChars = 200),
    ];
});
