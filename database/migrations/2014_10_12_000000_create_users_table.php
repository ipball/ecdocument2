<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', '50')->unique();
            $table->string('password', 100);
            $table->string('email', 100)->unique();
            $table->string('name', 100)->nullable(true);
            $table->string('department', 100)->nullable(true);
            $table->rememberToken();
            $table->timestamp('last_login')->useCurrent();
            $table->enum('user_type', ['member', 'moderator', 'admin'])->default('member');
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
        Schema::dropIfExists('users');
    }
}
