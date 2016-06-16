<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'employeeNumber' => '2016-Q1-00001',
            'firstName' => 'Gabriel John',
            'middleName' => 'Pilapil',
            'lastName'  => 'Gagno',
            'sex'       => 'M',
            'department_id' => 1,
            'position_id' => 1,
            'salary' => 50000.00,
            'dateStarted'   => date('Y-m-d h:i:s'),
            'email'      => 'gjpgagno@gmail.com',
            'password'   => bcrypt('secret')
        ));
    }
}
