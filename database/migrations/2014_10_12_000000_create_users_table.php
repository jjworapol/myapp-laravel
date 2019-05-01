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
            $table->bigIncrements('id'); //จะเป็น primary key แน่นอน
            $table->string('name');
            $table->enum('role',['ADMINISTRATOR','CREATOR','VIEWER'])->default('VIEWER');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); //timestamp พวกวัน เวลา
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); //จะได้ field ที่ชื่อ created_at,updated_at 2 field เลย
            $table->softDeletes();
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
