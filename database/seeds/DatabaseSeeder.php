<?php

use App\Tahaptakah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CounterSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UnitkerjaSeeder::class);
        $this->call(JenisIdentitasSeeder::class);
        $this->call(TakahSeeder::class);
        $this->call(TahaptakahSeeder::class);
    }
}
