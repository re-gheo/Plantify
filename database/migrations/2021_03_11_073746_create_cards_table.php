<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->integer('card_id', true);
            $table->string('card_holdername', 300)->nullable();
            $table->string('card_number', 300)->nullable()->unique('card_number');
            $table->string('card_cvv', 300)->nullable();
            $table->string('card_exp', 300)->nullable();
            $table->integer('card_typeid')->nullable()->index('card_typeid');
            $table->string('card_line1', 500)->nullable();
            $table->string('card_city', 300)->nullable();
            $table->string('card_state', 300)->nullable();
            $table->string('card_postal_code', 300)->nullable();
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
        Schema::dropIfExists('cards');
    }
}
