<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_stateid', 'users_ibfk_1')->references('user_stateid')->on('user_states')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('retailer_approvalstateid', 'users_ibfk_2')->references('retailer_approvalstateid')->on('retailer_approvalstates')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_ibfk_1');
            $table->dropForeign('users_ibfk_2');
        });
    }
}
