<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Tooth::class, function (Faker $faker) {
    $title = $faker->unique()->sentence(5);
    $rndminteger = $faker->randomDigitNotNull();

    return [
        'name'              => $title,
        'tooth_type_id'     => rand(1,5),   
        'tooth_stage_id'    => rand(1,5),   
        'tooth_position_id' => rand(1,5),   
        ];
});