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
        CREATE TRIGGER finish_stock_transfers AFTER UPDATE ON `stock_transfers` FOR EACH ROW
        BEGIN
        UPDATE stock_transactions SET status = IF(NEW.status = 1,1,0),location_id = IF(transaction = "IN",NEW.to,NEW.from) WHERE module = "ST" AND header_id = NEW.id;
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
        DB::unprepared('DROP TRIGGER `finish_stock_transfers`');
    }
};
