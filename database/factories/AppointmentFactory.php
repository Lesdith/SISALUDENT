<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Appointment::class, function (Faker $faker) {
    return [
        'appointment_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'appointment_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'patient_id'       => rand(1,5),
    ];
});
