<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bidang;
use Faker\Generator as Faker;

$factory->define(Bidang::class, function (Faker $faker) {
    App\Bidang::truncate();
    static $number1 = 0;
    static $number2 = 0;

    $nama = [
        'dokumen dan uang palsu',
        'balistik dan metalurgi',
        'fisika dan komputer',
        'kimia dan biologi',
        'narkotika dan obat berbahaya'
    ];

    $singkatan = [
        'dokupal',
        'balmet',
        'fiskom',
        'kimbio',
        'narkoba'
    ];

    return [
        'nama' => $nama[$number1++],
        'singkatan' => $singkatan[$number2++],
    ];
});
