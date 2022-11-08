<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = array(
            array(
                "id" => 1,
                "title" => "Admin",
                "created_at" => "2022-11-07 13:30:39",
                "updated_at" => "2022-11-07 13:30:40",
            ),
            array(
                "id" => 2,
                "title" => "Staff",
                "created_at" => "2022-11-07 13:30:40",
                "updated_at" => "2022-11-07 13:30:41",
            ),
        );

        Position::insert($positions);
    }
}
