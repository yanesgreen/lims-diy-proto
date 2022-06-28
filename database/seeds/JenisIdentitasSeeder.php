<?php

use Illuminate\Database\Seeder;

class JenisIdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\JenisIdentitas::class, 3)->create();
    }
}
