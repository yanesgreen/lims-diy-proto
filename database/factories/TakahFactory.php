<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Takah;
use Faker\Generator as Faker;

$factory->define(Takah::class, function (Faker $faker) {
    App\Takah::truncate();
    // counter
    static $counter1 = 0;
    static $counter2 = 0;

    // values
    static $nomor = [
        '000001/NNF/2020/PUS',
        '000002/NNF/2020/PUS',
        '000003/NNF/2020/PUS',
        '000004/NNF/2020/PUS',
        '000005/NNF/2020/PUS',
    ];

    return [
        'nomor' => $nomor[$counter1++],
        'editable' => 0
    ];
});
