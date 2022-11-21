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
        Schema::create('emp_compensation_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('pay_type_id')->constrained('pay_types')->onDelete('cascade');
            $table->decimal('pay_rate', 12, 3)->nullable();
            $table->text('reason')->nullable();
            $table->text('comment')->nullable();
            $table->date('trans_date');
            $table->string('status', 1)->default(0);
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
        Schema::dropIfExists('emp_compensation_histories');
    }
};
