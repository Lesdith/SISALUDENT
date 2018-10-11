<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_treatment::class, function (Faker $faker) {
    return [
        'name'              =>  $faker->word,
        'cost'          => $faker->randomFloat($nbMaxDecimals = Null, $min = 0, $max = null),
        'service_id'    => rand(1,5),
    ];
});
