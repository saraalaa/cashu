<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Config::class, function (Faker $faker) {
    return [
        'sale_target' => rand(1000, 10000)
    ];
});
