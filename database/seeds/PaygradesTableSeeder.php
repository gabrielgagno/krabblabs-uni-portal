<?php

use Illuminate\Database\Seeder;

class PaygradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paygrades')->insert(array(
            'paygradeNumber'    =>  "01",
            'min'               =>  5000.00,
            'max'               =>  9999.99,
            'created_at'        => date('Y:m:d H:i:s')
        ));

        DB::table('paygrades')->insert(array(
            'paygradeNumber'    =>  "02",
            'min'               =>  10000.00,
            'max'               =>  14999.99,
            'created_at'        => date('Y:m:d H:i:s')
        ));

        DB::table('paygrades')->insert(array(
            'paygradeNumber'    =>  "03",
            'min'               =>  15000.00,
            'max'               =>  24999.99,
            'created_at'        => date('Y:m:d H:i:s')
        ));

        DB::table('paygrades')->insert(array(
            'paygradeNumber'    =>  "04",
            'min'               =>  25000.00,
            'max'               =>  34999.99,
            'created_at'        => date('Y:m:d H:i:s')
        ));

        DB::table('paygrades')->insert(array(
            'paygradeNumber'    =>  "05",
            'min'               =>  35000.00,
            'max'               =>  44999.99,
            'created_at'        => date('Y:m:d H:i:s')
        ));
    }
}
