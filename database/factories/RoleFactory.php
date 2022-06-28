<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    \App\Role::truncate();
    static $number = 0;
    $nama = [
        'admin',
        'urtu/renmin',
        'kaurmin',
        'kalabforcab'
    ];
    return [
        'nama' => $nama[$number++],
    ];
});
