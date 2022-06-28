<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JenisIdentitas;
use Faker\Generator as Faker;

$factory->define(JenisIdentitas::class, function (Faker $faker) {
    JenisIdentitas::truncate();

    // counter
    static $counter1 = 0;

    // field
    static $nama = ['KTP', 'SIM', 'NRP'];

    return [
        'nama' => $nama[$counter1++],
    ];
});
