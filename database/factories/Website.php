<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Website::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'name' => $faker->name
    ];
});
