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
        DB::unprepared('
        CREATE TRIGGER finish_procurements AFTER UPDATE ON `procurements` FOR EACH ROW
        BEGIN
        UPDATE stock_transactions SET status = IF(NEW.status = 1,1,0),location_id = NEW.location_id WHERE module = "PUR" AND header_id = NEW.id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `finish_procurements`');
    }
};
