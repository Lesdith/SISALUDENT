<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Contact::class, function (Faker $faker) {
    return [
        'name'                      => $faker->name,
        'phone'                     => $faker->unique()->phoneNumber,
        'email'                     => $faker->unique()->safeEmail,
        'date'                      => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time'                      => $faker->time($format = 'H:i:s', $max = 'now'),
        //'reservation_method_id'     => rand(1,5),
        'description'               => $faker->text($maxNbChars = 200),
    ];
});
