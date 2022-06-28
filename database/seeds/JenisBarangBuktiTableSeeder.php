<?php

use Illuminate\Database\Seeder;

class JenisBarangBuktiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Jenisbb::class, 3)->create();
    }
}
