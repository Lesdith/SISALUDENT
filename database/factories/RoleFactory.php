<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Role::class, function (Faker $faker) {
        $title = $faker->unique()->sentence(5);
        
        return [
            'name'  => $title,
        ];
    });
    