<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInquirysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquirys', function (Blueprint $table) {
            $table->foreign('inquiry_userid', 'inquirys_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('inquiry_retailerid', 'inquirys_ibfk_2')->references('retailer_id')->on('retailers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('product_id', 'inquirys_ibfk_3')->references('product_id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquirys', function (Blueprint $table) {
            $table->dropForeign('inquirys_ibfk_1');
            $table->dropForeign('inquirys_ibfk_2');
            $table->dropForeign('inquirys_ibfk_3');
        });
    }
}
