<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        //$this->call(PaygradesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
