<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('store_id', true);
            $table->string('store_name', 300)->nullable();
            $table->string('store_description', 300)->nullable();
            $table->string('store_profileimage', 300)->nullable();
            $table->string('store_backgroundimage', 300)->nullable();
            $table->string('store_phonenumber', 300)->nullable();
            $table->dateTime('store_dateregistererd')->nullable();
            $table->integer('store_cardid')->nullable()->index('store_cardid');
            $table->string('store_gcashnumber', 300)->nullable();
            $table->tinyInteger('store_codoption');
            $table->integer('store_advertismentid')->nullable()->index('store_advertismentid');
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
        Schema::dropIfExists('stores');
    }
}
