<?php

namespace Database\Seeders;

use App\Models\EmployeeStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_statuses = array(
            array(
                "id" => 1,
                "title" => "Active",
                "created_at" => "2022-11-11 14:59:31",
                "updated_at" => "2022-11-11 14:59:34",
            ),
            array(
                "id" => 2,
                "title" => "Inactive",
                "created_at" => "2022-11-11 14:59:44",
                "updated_at" => "2022-11-11 14:59:46",
            ),
            array(
                "id" => 3,
                "title" => "Terminate",
                "created_at" => "2022-11-11 15:00:22",
                "updated_at" => "2022-11-11 15:00:23",
            ),
            array(
                "id" => 4,
                "title" => "Deceased",
                "created_at" => "2022-11-11 15:00:45",
                "updated_at" => "2022-11-11 15:00:46",
            ),
            array(
                "id" => 5,
                "title" => "Resigned",
                "created_at" => "2022-11-11 15:01:01",
                "updated_at" => "2022-11-11 15:01:01",
            ),
        );
        EmployeeStatus::insert($employee_statuses);
    }
}
