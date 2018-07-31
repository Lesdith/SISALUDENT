<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Tooth::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
        
    return [
        'name'              => $faker->title,
        'tooth_type_id'     => $faker->randomDigitNotNull(),   
        'tooth_stage_id'    => $faker->randomDigitNotNull(),   
        'tooth_position'    => $faker->randomDigitNotNull(),   
        ];
});
