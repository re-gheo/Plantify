<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('product_id', true);
            // $table->foreignId('retailer_id')->constrained('retailers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name', 100)->nullable();
            $table->string('product_description', 600)->nullable();
            $table->integer('commission_id')->nullable()->index('commission_id');
            $table->double('product_sizes')->nullable();
            $table->string('product_varieties', 60)->nullable();
            $table->string('product_referencep', 200)->nullable();
            $table->string('product_mainphoto', 300)->nullable();
            $table->integer('product_referenceid')->nullable()->index('product_referenceid');
            $table->integer('product_categoryid')->nullable()->index('product_categoryid');
            $table->double('product_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('retailer_id')->nullable()->index('retailer_id');
            $table->tinyInteger('isDeleted')->nullable();
            $table->tinyInteger('isPlant')->nullable();
            $table->boolean('verified')->default(false);
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
        Schema::dropIfExists('products');
    }
}
