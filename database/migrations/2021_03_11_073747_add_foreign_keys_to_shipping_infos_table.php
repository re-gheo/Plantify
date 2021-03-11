<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToShippingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_infos', function (Blueprint $table) {
            $table->foreign('order_id', 'shipping_infos_ibfk_1')->references('order_id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_infos', function (Blueprint $table) {
            $table->dropForeign('shipping_infos_ibfk_1');
        });
    }
}
