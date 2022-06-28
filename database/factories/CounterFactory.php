<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Counter;
use Faker\Generator as Faker;

$factory->define(Counter::class, function (Faker $faker) {
    // counter
    static $counter = 1;

    Counter::truncate();
    return [
        'unitkerja_id' => $counter++,
        'number' => 0,
    ];
});
