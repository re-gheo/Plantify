<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdvertismentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisment_history', function (Blueprint $table) {
            $table->foreign('user_id', 'advertisment_history_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('advertisment_paymenttype', 'advertisment_history_ibfk_2')->references('payment_typeid')->on('payment_types')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisment_history', function (Blueprint $table) {
            $table->dropForeign('advertisment_history_ibfk_1');
            $table->dropForeign('advertisment_history_ibfk_2');
        });
    }
}
