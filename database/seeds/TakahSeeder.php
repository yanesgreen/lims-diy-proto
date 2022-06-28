<?php

use Illuminate\Database\Seeder;

class TakahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Takah::class, 5)->create();
    }
}
