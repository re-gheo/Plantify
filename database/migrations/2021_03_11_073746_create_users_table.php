<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('email', 60)->nullable()->unique('email');
            $table->string('password', 60)->nullable();
            $table->string('first_name', 300)->nullable();
            $table->string('last_name', 300)->nullable();
            $table->string('name', 300)->nullable();
            $table->string('address', 300)->nullable();
            $table->string('govtid_number', 500)->nullable();
            $table->string('cp_number', 500)->nullable();
            $table->string('region', 30)->nullable();
            $table->date('birthday')->nullable();
            $table->string('provider_id', 300)->nullable();
            $table->string('avatar', 300)->nullable();
            $table->string('remember_token', 500)->nullable();
            $table->tinyInteger('otp_verified')->nullable();
            $table->integer('user_stateid')->nullable()->index('user_stateid');
            $table->integer('retailer_approvalstateid')->nullable()->index('retailer_approvalstateid');
            $table->string('user_role', 300)->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('users');
    }
}
