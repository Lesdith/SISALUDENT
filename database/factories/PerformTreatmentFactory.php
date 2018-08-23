<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Perform_treatment::class, function (Faker $faker) {
    return [
        'detail_treatment_plan_id'          => rand(1,5),
        'doctor_id'                         => rand(1,5),
        'status'                            => true,
    ];
});
