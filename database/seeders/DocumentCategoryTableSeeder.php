<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document_categories = array(
            array(
                "id" => 1,
                "title" => "Contract",
                "created_at" => "2022-11-15 10:59:14",
                "updated_at" => "2022-11-15 10:59:15",
            ),
            array(
                "id" => 2,
                "title" => "Memo",
                "created_at" => "2022-11-15 10:59:14",
                "updated_at" => "2022-11-15 10:59:15",
            ),
        );

        DocumentCategory::insert($document_categories);
    }
}
