<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->jsonb('method');
            $table->integer('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('movement_methods')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movement_methods');
    }
}
