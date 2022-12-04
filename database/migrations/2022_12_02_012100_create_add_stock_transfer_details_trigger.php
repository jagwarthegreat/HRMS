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
        CREATE TRIGGER add_stock_transfer_details AFTER INSERT ON `stock_transfer_details` FOR EACH ROW
        BEGIN
         INSERT INTO stock_transactions (`location_id`, `header_id`, `detail_id`, `module`, `transaction`, `stock_id`, `quantity`, `date`) VALUES (1,NEW.stock_transfer_id,NEW.id,"ST","OUT",NEW.stock_id,NEW.quantity,NOW());
         INSERT INTO stock_transactions (`location_id`, `header_id`, `detail_id`, `module`, `transaction`, `stock_id`, `quantity`, `date`) VALUES (1,NEW.stock_transfer_id,NEW.id,"ST","IN",NEW.stock_id,NEW.quantity,NOW());
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
        DB::unprepared('DROP TRIGGER `add_stock_transfer_details`');
    }
};
