<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tahaptakah;
use Faker\Generator as Faker;

$factory->define(Tahaptakah::class, function (Faker $faker) {
    Tahaptakah::truncate();

    // counter
    static $counter1 = 0;

    // field
    static $nama = [
        'Penerimaan Barang Bukti Dari Penyidik',
        'Pemeriksaan Laboratoris Barang Bukti',
        'Penyerahan BAP Laboratoris dan Barang Bukti Ke Penyidik',
    ];

    //seed
    return [
        'nama' => $nama[$counter1++],
    ];
});
