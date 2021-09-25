<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->integer('job_id');
            $table->date('bday');
            $table->boolean('male');
            $table->string('military');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->string('city');
            $table->string('area');
            $table->string('education');
            $table->string('experience');
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
