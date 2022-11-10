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
            $table->string('employee_code', 50);
            $table->string('firstname', 100);
            $table->string('middlename', 50);
            $table->string('lastname', 100);
            $table->string('contact', 14);
            $table->string('email', 150);
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('gender', 1);
            $table->string('civil_status', 10);
            $table->string('sss_number', 100);
            $table->string('tin_number', 100);
            $table->string('pagibig_number', 100);
            $table->string('philhealth_number', 100);
            $table->string('educ_elementary', 200);
            $table->string('educ_elem_year', 6);
            $table->string('educ_highschool', 200);
            $table->string('educ_hs_year', 6);
            $table->string('educ_college', 200);
            $table->string('educ_college_year', 6);
            $table->string('educ_college_degree', 200);
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
