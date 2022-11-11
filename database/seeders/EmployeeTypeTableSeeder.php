<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_types = array(
            array(
                "id" => 1,
                "title" => "Full Time",
                "created_at" => "2022-11-11 18:35:39",
                "updated_at" => "2022-11-11 18:35:40",
            ),
            array(
                "id" => 2,
                "title" => "Part Time",
                "created_at" => "2022-11-11 18:35:52",
                "updated_at" => "2022-11-11 18:35:53",
            ),
            array(
                "id" => 3,
                "title" => "On Contract",
                "created_at" => "2022-11-11 18:36:02",
                "updated_at" => "2022-11-11 18:36:03",
            ),
            array(
                "id" => 4,
                "title" => "Trainee",
                "created_at" => "2022-11-11 18:36:15",
                "updated_at" => "2022-11-11 18:36:15",
            ),
        );

        EmployeeType::insert($employee_types);
    }
}
