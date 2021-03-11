<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderBystoreitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_bystoreitems', function (Blueprint $table) {
            $table->foreign('product_id', 'order_bystoreitems_ibfk_1')->references('product_id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('retailer_id', 'order_bystoreitems_ibfk_2')->references('retailer_id')->on('retailers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('order_customerid', 'order_bystoreitems_ibfk_3')->references('customer_id')->on('customers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('shipping_id', 'order_bystoreitems_ibfk_4')->references('shipping_id')->on('shipping_infos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_bystoreitems', function (Blueprint $table) {
            $table->dropForeign('order_bystoreitems_ibfk_1');
            $table->dropForeign('order_bystoreitems_ibfk_2');
            $table->dropForeign('order_bystoreitems_ibfk_3');
            $table->dropForeign('order_bystoreitems_ibfk_4');
        });
    }
}
