<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRetailerApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retailer_applications', function (Blueprint $table) {
            $table->foreign('retailer_approvalstateid', 'retailer_applications_ibfk_1')->references('retailer_approvalstateid')->on('retailer_approvalstates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'retailer_applications_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retailer_applications', function (Blueprint $table) {
            $table->dropForeign('retailer_applications_ibfk_1');
            $table->dropForeign('retailer_applications_ibfk_2');
        });
    }
}
