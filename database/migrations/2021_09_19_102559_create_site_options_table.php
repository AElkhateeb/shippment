<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_options', function (Blueprint $table) {
            $table->float('weight_default')->default(3.0);
            $table->float('weight_fee')->default(0.0);
            $table->boolean('pickup')->default(true);
            $table->float('pickup_fee')->default(0.0);
            $table->boolean('todoor')->default(true);
            $table->float('todoor_fee')->default(0.0);
            $table->boolean('express')->default(true);
            $table->float('express_fee')->default(0.0);
            $table->boolean('breakable')->default(true);
            $table->float('breakable_fee')->default(0.0);
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
        Schema::dropIfExists('site_options');
    }
}
