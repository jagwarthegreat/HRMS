<?php

namespace Database\Seeders;

use App\Models\AssetCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asset_categories = array(
          array('id' => '1','name' => 'Consumables','created_at' => NULL,'updated_at' => NULL),
          array('id' => '2','name' => 'Office Equipment','created_at' => NULL,'updated_at' => NULL)
        );
        AssetCategory::insert($asset_categories);
    }
}
