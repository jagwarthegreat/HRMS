<?php

namespace Database\Seeders;

use App\Models\PayType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pay_types = array(
            array(
                "id" => 1,
                "title" => "Hourly",
                "created_at" => "2022-11-11 15:06:09",
                "updated_at" => "2022-11-11 15:06:10",
            ),
            array(
                "id" => 2,
                "title" => "Daily",
                "created_at" => "2022-11-11 15:06:18",
                "updated_at" => "2022-11-11 15:06:19",
            ),
            array(
                "id" => 3,
                "title" => "Weekly",
                "created_at" => "2022-11-11 15:07:00",
                "updated_at" => "2022-11-11 15:07:01",
            ),
            array(
                "id" => 4,
                "title" => "Biweekly",
                "created_at" => "2022-11-11 15:07:25",
                "updated_at" => "2022-11-11 15:07:26",
            ),
            array(
                "id" => 5,
                "title" => "Monthly",
                "created_at" => "2022-11-11 15:07:08",
                "updated_at" => "2022-11-11 15:07:09",
            ),
        );

        PayType::insert($pay_types);
    }
}
