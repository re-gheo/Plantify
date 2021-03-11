<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailercardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailercards', function (Blueprint $table) {
            $table->integer('card_id', true);
            $table->string('card_holdername', 300)->nullable();
            $table->string('card_cvv', 300)->nullable();
            $table->string('card_exp', 300)->nullable();
            $table->integer('card_typeid')->nullable()->index('card_typeid');
            $table->integer('user_id')->nullable()->index('user_id');
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
        Schema::dropIfExists('retailercards');
    }
}
