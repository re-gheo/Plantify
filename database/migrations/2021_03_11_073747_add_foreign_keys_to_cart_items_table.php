<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->foreign('cart_id', 'cart_items_ibfk_1')->references('cart_id')->on('shopping_carts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('product_id', 'cart_items_ibfk_2')->references('product_id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('retailer_id', 'cart_items_ibfk_3')->references('retailer_id')->on('retailers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'cart_items_ibfk_4')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign('cart_items_ibfk_1');
            $table->dropForeign('cart_items_ibfk_2');
            $table->dropForeign('cart_items_ibfk_3');
            $table->dropForeign('cart_items_ibfk_4');
        });
    }
}
