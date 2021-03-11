<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertismentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisment_history', function (Blueprint $table) {
            $table->integer('advertisment_historyid', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->dateTime('advertisment_datepurchased')->nullable();
            $table->double('advertisment_cost')->nullable();
            $table->integer('advertisment_paymenttype')->nullable()->index('advertisment_paymenttype');
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
        Schema::dropIfExists('advertisment_history');
    }
}
