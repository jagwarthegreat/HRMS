<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
            array(
                "id" => 1,
                "title" => "HR Department",
                "created_at" => "2022-11-11 15:05:12",
                "updated_at" => "2022-11-11 15:05:14",
            ),
        );
        Department::insert($departments);
    }
}
