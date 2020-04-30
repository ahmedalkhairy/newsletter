<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Newsletter;
use Faker\Generator as Faker;

$factory->define(Newsletter::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,

        'description' => $faker->text(),
        
        'active' => random_int(0, 1),
    ];
});
