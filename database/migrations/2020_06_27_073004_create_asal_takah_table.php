<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsalTakahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asaltakah', function (Blueprint $table) {
            $table->id();
            $table->string('instansi', 50);
            $table->unsignedBigInteger('satker_id')->nullable();
            $table->unsignedBigInteger('polda_id')->nullable();
            $table->unsignedBigInteger('polres_id')->nullable();
            $table->unsignedBigInteger('polsek_id')->nullable();
            $table->unsignedBigInteger('lembaga_id')->nullable();
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
        Schema::dropIfExists('asaltakah');
    }
}
