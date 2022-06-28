<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangbuktiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangbukti', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi', 100)->nullable();
            $table->unsignedInteger('jenisbb_id');
            $table->string('dibuka_oleh', 100)->nullable();
            $table->string('jumlah', 100);
            $table->integer('berat')->nullable();
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('barangbukti');
    }
}
