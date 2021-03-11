<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->integer('commission_id', true);
            $table->string('commissiontype', 300)->nullable();
            $table->double('commissions_max_add')->nullable();
            $table->double('commissions_max_percentage')->nullable();
            $table->double('commissions_min')->nullable();
            $table->double('commissions_min_add')->nullable();
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
        Schema::dropIfExists('commissions');
    }
}
