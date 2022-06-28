<?php

use Illuminate\Database\Seeder;

class UnitkerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UnitKerja::class, 9)->create();
    }
}
