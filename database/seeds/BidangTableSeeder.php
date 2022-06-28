<?php

use Illuminate\Database\Seeder;

class BidangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bidang::class, 6)->create();
    }
}
