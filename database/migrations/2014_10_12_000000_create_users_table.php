<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name', 255)->nullable()->comment('user first name use');
            $table->string('last_name', 255)->nullable()->comment('user last name use');
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('dob', 255)->nullable();
            $table->string('image_path', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user')->nullable();
            $table->rememberToken();
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
