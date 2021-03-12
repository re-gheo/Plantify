<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('comment_id', true);
            $table->integer('comment_userid')->nullable()->index('comment_userid');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->tinyInteger('inquiryAnswer')->nullable();
            $table->integer('inquiry_id')->nullable()->index('inquiry_id');
            $table->string('user_comment', 5000)->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
