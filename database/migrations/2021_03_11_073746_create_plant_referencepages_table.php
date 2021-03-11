<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantReferencepagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_referencepages', function (Blueprint $table) {
            $table->integer('plant_referenceid', true);
            $table->string('plant_scientificname', 300);
            $table->string('plant_description', 5000);
            $table->string('plant_maintenance', 5000);
            $table->integer('plant_categoryid')->nullable()->index('plant_categoryid');
            $table->string('plant_photo', 300);
            $table->string('plant_phototwo', 300)->nullable();
            $table->string('plant_photothree', 300)->nullable();
            $table->integer('keyword_id')->nullable()->index('keyword_id');
            $table->tinyInteger('isDeleted')->nullable();
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
        Schema::dropIfExists('plant_referencepages');
    }
}
