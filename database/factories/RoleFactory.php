<?php

use Faker\Generator as Faker;

$factory->define(IntelGUA\Sisaludent\Role::class, function (Faker $faker) {

        return [
        'name'              =>  $faker->word,
        ];
    });
