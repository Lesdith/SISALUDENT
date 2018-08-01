<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Patient::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName, 
        'second_name'       => $faker->firstName,
        'third_name'        => $faker->firstName, 
        'father_last_name'  => $faker->lastName, 
        'mother_last_name'  => $faker->lastName, 
        'birth_date'        => $faker->date($format = 'Y-m-d', $max = 'now'), 
        'address'           => $faker->address, 
        'phone_number'      => $faker->phoneNumber,  
        'gender_id'         => rand(1,5),   
        'location_id'       => rand(1,5), 
        'municipality_id'   => rand(1,5),

     ];
});
