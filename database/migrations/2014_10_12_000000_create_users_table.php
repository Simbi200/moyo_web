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
            $table->bigIncrements('id');
            // $table->string('name')->nullable();
            // $table->string('email')->unique()->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('position')->nullable();
            $table->string('bio', 2000)->nullable();
            $table->date('dob')->nullable();
            $table->integer('form')->nullable();
            $table->enum('sex', ['F', 'M'])->nullable();
            $table->enum('type', ['student', 'admin', 'teacher', 'support', 'admin_teacher']);
            $table->date('joined_on');
            $table->string('profile_pic')->nullable();
            $table->string('username')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
