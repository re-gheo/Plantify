<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->integer('cart_itemid', true);
            $table->string('cart_itemname', 300)->nullable();
            $table->integer('cart_id')->nullable()->index('cart_id');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->integer('retailer_id')->nullable()->index('retailer_id');
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('cart_quantity')->nullable()->index('cart_quantityid');
            $table->double('cart_itemcost')->nullable();
            $table->double('cart_subtotal')->nullable();
            $table->tinyInteger('checked')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
}
