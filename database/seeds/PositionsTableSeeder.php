<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Department;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Executive Office
        DB::table('positions')->insert(array(
            'id'                =>  1,
            'positionCode'      =>  'EO-CEO',
            'title'             =>  'Chief Executive Officer',
            'department_id'     =>  7,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        // Department of Software Engineering
        DB::table('positions')->insert(array(
            'id'                =>  2,
            'positionCode'      =>  'SE-JSE',
            'title'             =>  'Software Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  3,
            'positionCode'      =>  'SE-MSE',
            'title'             =>  'Mid Software Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  4,
            'positionCode'      =>  'SE-SSE',
            'title'             =>  'Senior Software Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  5,
            'positionCode'      =>  'SE-LSE',
            'title'             =>  'Lead Software Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  6,
            'positionCode'      =>  'SE-JQA',
            'title'             =>  'Quality Assurance Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  7,
            'positionCode'      =>  'SE-SQA',
            'title'             =>  'Senior Quality Assurance Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  8,
            'positionCode'      =>  'SE-LQA',
            'title'             =>  'Lead Quality Assurance Engineer',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  9,
            'positionCode'      =>  'SE-PRM',
            'title'             =>  'Project Manager',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  10,
            'positionCode'      =>  'SE-JSA',
            'title'             =>  'Software Architect',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));

        DB::table('positions')->insert(array(
            'id'                =>  11,
            'positionCode'      =>  'SE-CSA',
            'title'             =>  'Chief Software Architect',
            'department_id'     =>  1,
            'created_at'        =>  date('Y-m-d H:i:s')
        ));
    }
}
