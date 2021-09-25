<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangerAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manger_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->rememberToken();

            $table->boolean('activated')->default(false);
            $table->boolean('forbidden')->default(false);
            $table->string('language', 2)->default('en');

            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();

            $table->unique(['email', 'deleted_at']);
        });
        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");
        if ($driver === 'pgsql') {
            Schema::table('manger_admins', static function (Blueprint $table) {
                DB::statement('CREATE UNIQUE INDEX manger_admins_email_null_deleted_at ON manger_admins (email) WHERE deleted_at IS NULL;');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manger_admins');
    }
}
