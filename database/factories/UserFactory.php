<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    App\User::truncate();
    // counter
    static $counter1 = 0;
    static $counter2 = 0;
    static $counter3 = 0;
    static $counter4 = 0;
    static $counter5 = 0;
    static $counter6 = 0;
    static $counter7 = 0;
    static $counter8 = 0;

    // field
    static $role_id = [1, 2, 3, 3, 4];
    static $bidang_id = [1, 1, 2, 3, 1];
    static $jabatan_id = [1, 2, 3, 3, 4];
    static $subbidang_id = [1, 2, 3, 4, 5];
    static $pangkat_id = [1, 2, 3, 4, 5];
    static $name = [
        'Admin Demo',
        'Urtu Demo',
        'Kaurmin Teknis Demo 1',
        'Kaurmin Teknis Demo 2',
        'Pimpinan Demo'
    ];
    static $username = [
        'admindemo',
        'urtudemo',
        'kaurmindemo1',
        'kaurmindemo2',
        'pimpinandemo'
    ];
    static $nrp = [
        '85071936',
        '86071936',
        '8771936',
        '88071936',
        '89071936'
    ];

    //seed
    return [
        'nama' => $name[$counter1++],
        'nrp' => $nrp[$counter8++],
        'username' => $username[$counter2++],
        'password' => Hash::make('@password-pussansiad'),
        'role_id' => $role_id[$counter3++],
        'bidang_id' => $bidang_id[$counter4++],
        'subbidang_id' => $subbidang_id[$counter5++],
        'jabatan_id' => $jabatan_id[$counter6++],
        'pangkat_id' => $pangkat_id[$counter7++],
        'aktif' => 1,
        'remember_token' => Str::random(10),
        'digitalsign' => 'yaneszJhK3UiKA0.png'
    ];
});
