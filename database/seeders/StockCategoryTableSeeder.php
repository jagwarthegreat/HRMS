<?php

namespace Database\Seeders;

use App\Models\StockCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categories = array(
          array('id' => '1','name' => 'Consumables','created_at' => NULL,'updated_at' => NULL),
          array('id' => '2','name' => 'Office Equipment','created_at' => NULL,'updated_at' => NULL)
        );
		StockCategory::insert($categories);
    }
}
