<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->integer('retailer_id')->nullable()->index('retailer_id');
            $table->integer('store_id')->nullable()->index('store_id');
            $table->integer('computed_ratings')->nullable();
            $table->double('ratings_id')->nullable();
            $table->string('retailer_address', 300)->nullable();
            $table->string('retailer_postalcode', 200)->nullable();
            $table->string('retailer_personincharge', 300)->nullable();
            $table->string('retailer_officialidfront', 300)->nullable();
            $table->string('retailer_officialidback', 300)->nullable();
            $table->string('retailer_idnumber', 300)->nullable();
            $table->date('retailer_birthdate')->nullable();
            $table->string('retailer_city', 300)->nullable();
            $table->string('retailer_barangay', 300)->nullable();
            $table->string('retailer_region', 300)->nullable();
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
        Schema::dropIfExists('retailers');
    }
}
