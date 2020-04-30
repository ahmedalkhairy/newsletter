<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mail;
use App\Newsletter;
use Faker\Generator as Faker;

$factory->define(Mail::class, function (Faker $faker) {

    return [
        'title' => $faker->unique()->name,
        'content' => $faker->sentence(50),
        'newsletter_id' => factory(Newsletter::class),
    ];
});
