<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdvertismentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisments', function (Blueprint $table) {
            $table->foreign('advertisment_stateid', 'advertisments_ibfk_1')->references('advertisment_stateid')->on('advertisment_states')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisments', function (Blueprint $table) {
            $table->dropForeign('advertisments_ibfk_1');
        });
    }
}
