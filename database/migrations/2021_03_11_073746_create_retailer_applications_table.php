<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailer_applications', function (Blueprint $table) {
            $table->integer('retailer_applicationid', true);
            $table->string('retailer_address', 300)->nullable();
            $table->string('retailer_postalcode', 300)->nullable();
            $table->string('retailer_personincharge', 300)->nullable();
            $table->string('retailer_officialidfront', 300)->nullable();
            $table->string('retailer_officialidback', 300)->nullable();
            $table->string('retailer_idnumber', 300)->nullable();
            $table->date('retailer_birthdate')->nullable();
            $table->string('retailer_city', 300)->nullable();
            $table->string('retailer_barangay', 300)->nullable();
            $table->string('retailer_region', 300)->nullable();
            $table->integer('retailer_approvalstateid')->nullable()->index('retailer_approvalstateid');
            $table->integer('user_id')->nullable()->index('user_id');
            $table->string('deny_reason', 300)->nullable();
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
        Schema::dropIfExists('retailer_applications');
    }
}
