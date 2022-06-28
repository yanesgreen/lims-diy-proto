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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('nrp');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('subbidang_id')->nullable();
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('pangkat_id');
            $table->string('digitalsign');
            $table->boolean('aktif');
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
