<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_referenceid', 'products_ibfk_1')->references('plant_referenceid')->on('plant_referencepages')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('product_categoryid', 'products_ibfk_2')->references('product_categoryid')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('retailer_id', 'products_ibfk_3')->references('retailer_id')->on('retailers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_ibfk_1');
            $table->dropForeign('products_ibfk_2');
            $table->dropForeign('products_ibfk_3');
        });
    }
}
