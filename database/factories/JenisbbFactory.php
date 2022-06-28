<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Jenisbb;
use Faker\Generator as Faker;

$factory->define(Jenisbb::class, function (Faker $faker) {
    App\Jenisbb::truncate();
    static $number = 0;
    static $number2 = 0;
    $nama = ['Harddisk Drive', 'Handphone', 'Flashdrive'];
    $singkatan = ['Hdd', 'Hp', 'Fd'];
    return [
        'nama' => $nama[$number++],
        'singkatan' => $singkatan[$number2++],
    ];
});
