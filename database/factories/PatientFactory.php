<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Patient::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName($gender = null|'male'|'female'), 
        'second_name'       => $faker->firstName($gender = null|'male'|'female'),
        'third_name'        => $faker->firstName($gender = null|'male'|'female'), 
        'first_surname'     => $faker->lastName, 
        'second_surname'    => $faker->lastName, 
        'gender_id'         => $faker->randomDigitNotNull(),
        'birth_date'        => $faker->date($format = 'Y-m-d', $max = 'now'), 
        'location_id'       => $faker->randomDigitNotNull(), 
        'address'           => $faker->address, 
        'municipality_id'   => $faker->randomDigitNotNull(),
        'phone_number'      => $faker->phoneNumber,   
     ];
});
