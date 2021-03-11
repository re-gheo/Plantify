<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->integer('shipping_id')->primary();
            $table->string('tracking_number', 300)->nullable();
            $table->string('carrier_code', 20)->nullable();
            $table->string('title', 120)->nullable();
            $table->string('logistics_channel', 120)->nullable();
            $table->integer('order_id')->nullable()->index('order_id');
            $table->string('customer_phone', 20)->nullable();
            $table->dateTime('order_create_time')->nullable();
            $table->string('destination_code', 12)->nullable();
            $table->string('tracking_ship_date', 12)->nullable();
            $table->string('tracking_postal_code', 6)->nullable();
            $table->string('Adress', 300)->nullable();
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
        Schema::dropIfExists('shipping_infos');
    }
}
