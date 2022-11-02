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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code', 10);
            $table->string('firstname', 100);
            $table->string('middlename', 50);
            $table->string('lastname', 100);
            $table->integer('contact');
            $table->text('address');
            $table->date('date_of_birth');
            $table->date('date_hired');
            $table->string('gender', 1);
            $table->string('civil_status', 10);
            $table->string('sss_number', 100);
            $table->string('tin_number', 100);
            $table->string('pagibig_number', 100);
            $table->string('employment_status', 20);
            $table->integer('position');
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
        Schema::dropIfExists('employees');
    }
};
