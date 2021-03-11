<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->foreign('store_cardid', 'stores_ibfk_1')->references('card_id')->on('cards')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('store_advertismentid', 'stores_ibfk_2')->references('advertisment_id')->on('advertisments')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign('stores_ibfk_1');
            $table->dropForeign('stores_ibfk_2');
        });
    }
}
