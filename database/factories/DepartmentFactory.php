<?php

use Faker\Generator as Faker;

$factory->define(Sisaludent\Department::class, function (Faker $faker) {
    return [
        'name'  =>  $faker->name,
    ];
});
