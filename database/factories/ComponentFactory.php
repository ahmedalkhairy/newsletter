<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Component;
use App\Type;
use Faker\Generator as Faker;

$factory->define(Component::class, function (Faker $faker) {
    return [
        'type_id' => factory(Type::class),
        'content' => $faker->sentence(50),
    ];
});
