<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UnitKerja;
use Faker\Generator as Faker;

$factory->define(UnitKerja::class, function (Faker $faker) {
    // counter
    static $counter1 = 0;
    static $counter2 = 0;
    static $counter3 = 0;

    // field
    static $nama = [1, 2, 3, 3, 4, 5, 6, 7, 8, 9];
    static $singkatan = [1, 2, 3, 3, 4, 5, 6, 7, 8, 9];
    static $alamat = [1, 2, 3, 3, 4, 5, 6, 7, 8, 9];

    // values
    static $nama = [
        'PUSAT LABORATORIUM FORENSIK',
        'BIDLABFOR POLDA JAWA TIMUR',
        'BIDLABFOR POLDA SUMATRA UTARA',
        'BIDLABFOR POLDA JAWA TENGAH',
        'BIDLABFOR POLDA SULAWESI SELATAN',
        'BIDLABFOR POLDA SUMATRA SELATAN',
        'BIDLABFOR POLDA BALI',
        'BIDLABFOR POLDA RIAU',
        'BIDLABFOR POLDA PAPUA',
    ];

    static $singkatan = [
        'PUS',
        'SBY',
        'MDN',
        'SMG',
        'MKS',
        'PLG',
        'DPS',
        'RI',
        'IRIAN',
    ];

    static $alamat = [
        'Jl. Raya Babakan Madang No. 67, Cipambuan, Sentul, Bogor, Indonesia 16810',
        'Jl. Frontage Ahmad Yani Siwalankerto, Gayungan, Wonocolo, Kota SBY, Jawa Timur 60231',
        'Jl. SM. Raja Km. 10,5 No. 60 Medan - Medan (Kota)',
        'Kompleks Akpol Candi Baru (Jl. Sultan Agung), Semarang, Jawa Tengah',
        'Pabaeng-Baeng, Tamalate, Kota Makassar, Sulawesi Selatan 90223',
        'Jl. Kolonel H. Barlian KM.4,5, Pahlawan, Kemuning, Kota Palembang, Sumatera Selatan 30151',
        'Jl. Gunung Sanghyang No. 108 B, Padangsambian, Denpasar Barat, Padangsambian, Denpasar, Kota Denpasar, Bali 80117',
        'Jl. Jenderal Sudirman No.235, Simpang Empat, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28111',
        'Jl. Sam Ratulangi No.8, Bayangkara, Jayapura Utara, Kota Jayapura, Papua 99112',
    ];

    // return
    return [
        'nama' => $nama[$counter1++],
        'singkatan' => $singkatan[$counter2++],
        'alamat' => $alamat[$counter3++],
    ];
});
