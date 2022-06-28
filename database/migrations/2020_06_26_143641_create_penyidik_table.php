<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyidikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyidik', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_identitas');
            $table->unsignedInteger('jenisidentitas_id');
            $table->unsignedInteger('pangkat_id')->nullable();
            $table->string('telepon', 25)->nullable();
            $table->string('foto')->nullable();
            $table->string('digitalsign')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('penyidik');
    }
}
