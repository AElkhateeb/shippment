<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->morphs('reason');
            $table->morphs('made');
            $table->boolean('in_out');
            $table->boolean('enabled')->default(true);
            $table->integer('from_id');
            $table->integer('to_id');
            $table->integer('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('account_admins')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('shipper_admins')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('employee_admins')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('manger_admins')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('agent_admins')->onUpdate('cascade');
            $table->foreign('made_id')->references('id')->on('ceo_admins')->onUpdate('cascade');
            $table->foreign('from_id')->references('id')->on('wallets')->onUpdate('cascade');
            $table->foreign('to_id')->references('id')->on('wallets')->onUpdate('cascade');
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
        Schema::dropIfExists('withdrawals');
    }
}
