<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRetailercardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retailercards', function (Blueprint $table) {
            $table->foreign('card_typeid', 'retailercards_ibfk_1')->references('card_typeid')->on('card_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'retailercards_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retailercards', function (Blueprint $table) {
            $table->dropForeign('retailercards_ibfk_1');
            $table->dropForeign('retailercards_ibfk_2');
        });
    }
}
