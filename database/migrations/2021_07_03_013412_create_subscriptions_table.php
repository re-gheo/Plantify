<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            // $table->id();
            // $table->unsignedBigInteger('retailer_id');
            // $table->unsignedInteger('plan_id');
            // // $table->foreignId('retailer_id')->constrained("retailers", "retailer_id");
            // $table->date('date_start');
            // $table->date('date_end');
            // $table->integer('duration');
            // $table->string('email');
            // $table->integer('total_amount');
            // $table->string('payment_state');
            // $table->string('payment_method');
            // $table->timestamps();


            $table->id();
            $table->unsignedBigInteger('retailer_id');
            $table->foreignId('invoice_id');
            $table->foreignId('plan_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('duration');

            $table->timestamps();

            // $table->foreign('retailer_id')->references('retailer_id')->on('retailers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
