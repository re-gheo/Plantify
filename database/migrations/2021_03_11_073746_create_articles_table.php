<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->integer('article_id', true);
            $table->string('article_topic', 300)->nullable();
            $table->string('article_description', 5000)->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable()->index('user_id');
            $table->tinyInteger('isDeleted')->nullable();
            $table->tinyInteger('article_resolved')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
