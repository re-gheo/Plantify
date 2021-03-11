<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAssignedKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigned_keywords', function (Blueprint $table) {
            $table->foreign('product_id', 'assigned_keywords_ibfk_1')->references('product_id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('owned_keywordid', 'assigned_keywords_ibfk_2')->references('keyword_id')->on('keywords')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigned_keywords', function (Blueprint $table) {
            $table->dropForeign('assigned_keywords_ibfk_1');
            $table->dropForeign('assigned_keywords_ibfk_2');
        });
    }
}
