<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jabatan;
use Faker\Generator as Faker;

$factory->define(Jabatan::class, function (Faker $faker) {
    \App\Jabatan::truncate();
    static $number = 0;
    $name = ['non jabatan', 'petugas urtu', 'kaurmin teknis', 'kabagjemenmutu', 'pimpinan'];
    return [
        'nama' => $name[$number++]
    ];
});

