<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquirysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquirys', function (Blueprint $table) {
            $table->integer('inquiry_id', true);
            $table->integer('inquiry_userid')->nullable()->index('inquiry_userid');
            $table->integer('inquiry_retailerid')->nullable()->index('inquiry_retailerid');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->string('user_inquiry', 5000)->nullable();
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
        Schema::dropIfExists('inquirys');
    }
}
