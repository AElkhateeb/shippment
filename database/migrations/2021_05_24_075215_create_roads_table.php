<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->float('time');
            $table->boolean('enabled')->default(true);
            $table->boolean('pickup')->default(true);
            $table->boolean('todoor')->default(true);
            $table->boolean('express')->default(true);
            $table->boolean('breakable')->default(true);
            $table->integer('from_id');
            $table->integer('to_id');
            $table->foreign('from_id')->references('id')->on('places')->onUpdate('cascade');
            $table->foreign('to_id')->references('id')->on('places')->onUpdate('cascade');
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
        Schema::dropIfExists('roads');
    }
}
