<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBystoreitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bystoreitems', function (Blueprint $table) {
            $table->integer('order_bystoreitem_id', true);
            $table->integer('product_id')->nullable()->index('product_id');
            $table->integer('retailer_id')->nullable()->index('retailer_id');
            $table->integer('order_customerid')->nullable()->index('order_customerid');
            $table->integer('order_id')->nullable();
            $table->integer('shipping_id')->nullable()->index('shipping_id');
            $table->integer('order_quantity')->nullable();
            $table->double('order_unitcost')->nullable();
            $table->double('order_subtotal')->nullable();
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
        Schema::dropIfExists('order_bystoreitems');
    }
}
