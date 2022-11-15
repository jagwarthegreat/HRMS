<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained('employees')->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained('document_categories')->onDelete('set null');
            $table->string("filename", 150);
            $table->string("filetype", 60);
            $table->string("filesize", 60);
            $table->text("slug");
            $table->foreignId('created_by')->nullable()->constrained('employees')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
