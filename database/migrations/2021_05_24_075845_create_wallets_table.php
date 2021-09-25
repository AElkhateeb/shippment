<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->float('money')->default(0.0);
            $table->morphs('belongs_to');
            $table->timestamps();
            $table->foreign('belongs_to_id')->references('id')->on('branches')->onUpdate('cascade');
            $table->foreign('belongs_to_id')->references('id')->on('account_admins')->onUpdate('cascade');
            $table->foreign('belongs_to_id')->references('id')->on('shipper_admins')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
