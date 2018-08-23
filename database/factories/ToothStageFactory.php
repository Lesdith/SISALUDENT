<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Tooth_stage::class, function (Faker $faker) {
   
    $title = $faker->unique()->sentence(5);
    return [
        'name'  => $title,
    ];
});
