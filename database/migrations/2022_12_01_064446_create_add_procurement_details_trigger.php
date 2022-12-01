<?php

use Illuminate\Database\Migrations\Migration;

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
        CREATE TRIGGER add_procurements_details AFTER INSERT ON `procurement_details` FOR EACH ROW
        BEGIN
         INSERT INTO stock_transactions (`location_id`, `header_id`, `detail_id`, `module`, `transaction`, `stock_id`, `quantity`, `date`) VALUES (1,NEW.procurement_id,NEW.id,"PUR","IN",NEW.stock_id,NEW.quantity,NOW());
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
        DB::unprepared('DROP TRIGGER `add_procurements_details`');
    }
};
