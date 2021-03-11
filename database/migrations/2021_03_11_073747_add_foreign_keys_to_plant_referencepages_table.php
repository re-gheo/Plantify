<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPlantReferencepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plant_referencepages', function (Blueprint $table) {
            $table->foreign('plant_categoryid', 'plant_referencepages_ibfk_1')->references('product_categoryid')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('keyword_id', 'plant_referencepages_ibfk_2')->references('keyword_id')->on('keywords')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plant_referencepages', function (Blueprint $table) {
            $table->dropForeign('plant_referencepages_ibfk_1');
            $table->dropForeign('plant_referencepages_ibfk_2');
        });
    }
}
