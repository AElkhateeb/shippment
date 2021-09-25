<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reason')->nullable();
            $table->integer('shipment_id');
            $table->integer('method_id');
            $table->morphs('employee');
            $table->integer('branch_id');
            $table->integer('method_parent_id')->nullable();
            $table->foreign('shipment_id')->references('id')->on('shipments')->onUpdate('cascade');
            $table->foreign('method_id')->references('id')->on('movement_methods')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('employee_admins')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('manger_admins')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('agent_admins')->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('ceo_admins')->onUpdate('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade');
            $table->foreign('method_parent_id')->references('id')->on('movement_methods')->onUpdate('cascade');
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
        Schema::dropIfExists('movements');
    }
}
