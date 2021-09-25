<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location')->nullable();
            $table->float('lng')->nullable();
            $table->float('lat')->nullable();
            $table->jsonb('name');
            $table->jsonb('governorate');
            $table->boolean('is_published')->default(true);
            $table->integer('manger');
            $table->integer('agent')->nullable();
            $table->foreign('manger')->references('id')->on('manger_admins')->onUpdate('cascade');
            $table->foreign('agent')->references('id')->on('agent_admins')->onUpdate('cascade');
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
        Schema::dropIfExists('branches');
    }
}
