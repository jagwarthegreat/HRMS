<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = array(
            array(
                "id" => 1,
                "title" => "Main Location",
                "created_at" => "2022-11-11 15:05:41",
                "updated_at" => "2022-11-11 15:05:41",
            ),
        );

        Location::insert($locations);
    }
}
