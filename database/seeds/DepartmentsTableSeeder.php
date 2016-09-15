<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(array(
            'id'            =>  1,
            'deptCode'      =>  'SE',
            'deptName'      =>  'Software Engineering',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  2,
            'deptCode'      =>  'HR',
            'deptName'      =>  'Human Resource Management',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  3,
            'deptCode'      =>  'LS',
            'deptName'      =>  'Logistics and Support Services',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  4,
            'deptCode'      =>  'SM',
            'deptName'      =>  'Sales and Marketing',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  5,
            'deptCode'      =>  'FA',
            'deptName'      =>  'Finance and Accounting',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  6,
            'deptCode'      =>  'UX',
            'deptName'      =>  'User Experience and Design',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));

        DB::table('departments')->insert(array(
            'id'            =>  7,
            'deptCode'      =>  'EO',
            'deptName'      =>  'Executive Office',
            'created_at'    =>  date('Y-m-d H:i:s')
        ));
    }
}
