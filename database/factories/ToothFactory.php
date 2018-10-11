<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth::class, function (Faker $faker) {
    $rndminteger = $faker->randomDigitNotNull();

    return [
        'name'              =>  $faker->word,
        'tooth_type_id'     => rand(1,5),
        'tooth_stage_id'    => rand(1,5),
        'tooth_position_id' => rand(1,5),
        ];
});
