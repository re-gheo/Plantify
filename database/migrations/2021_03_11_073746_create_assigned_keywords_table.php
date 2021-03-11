<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_keywords', function (Blueprint $table) {
            $table->integer('assigned_keywordid', true);
            $table->integer('product_id')->nullable()->index('product_id');
            $table->integer('owned_keywordid')->nullable()->index('owned_keywordid');
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
        Schema::dropIfExists('assigned_keywords');
    }
}
