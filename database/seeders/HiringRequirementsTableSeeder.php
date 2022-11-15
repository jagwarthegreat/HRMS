<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HiringRequirement;

class HiringRequirementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hiring_requirements = array(
            array(
                "id" => 1,
                "title" => "BIR-TIN",
                "created_at" => "2022-11-15 15:47:23",
                "updated_at" => "2022-11-15 15:47:26",
            ),
            array(
                "id" => 2,
                "title" => "Philhealth ID",
                "created_at" => "2022-11-15 15:47:23",
                "updated_at" => "2022-11-15 15:47:26",
            ),
            array(
                "id" => 3,
                "title" => "SSS ID",
                "created_at" => "2022-11-15 15:47:23",
                "updated_at" => "2022-11-15 15:47:26",
            ),
            array(
                "id" => 4,
                "title" => "HDMF",
                "created_at" => "2022-11-15 15:47:23",
                "updated_at" => "2022-11-15 15:47:26",
            ),
            array(
                "id" => 5,
                "title" => "Birth  Certificate",
                "created_at" => "2022-11-15 15:47:23",
                "updated_at" => "2022-11-15 15:47:26",
            ),
        );

        HiringRequirement::insert($hiring_requirements);
    }
}
