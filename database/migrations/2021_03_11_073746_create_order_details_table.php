<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->string('orderdetails_id', 300)->primary();
            $table->string('products', 500)->nullable();
            $table->integer('order_id')->nullable()->index('order_id');
            $table->string('paymentintentid', 150)->nullable();
            $table->double('order_unitcost')->nullable();
            $table->double('order_subtotal')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
