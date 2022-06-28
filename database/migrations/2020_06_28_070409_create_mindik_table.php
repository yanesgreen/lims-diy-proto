<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMindikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mindik', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('laporan_polisi')->default(0);
            $table->tinyInteger('surat_permohonan')->default(0);;
            $table->tinyInteger('sprin_penggeledahan')->default(0);
            $table->tinyInteger('bap_penggeledahan')->default(0);
            $table->tinyInteger('sprin_penyitaan')->default(0);
            $table->tinyInteger('bap_penyitaan')->default(0);
            $table->tinyInteger('bap_saksi')->default(0);
            $table->tinyInteger('bap_tersangka')->default(0);
            $table->tinyInteger('laporan_kemajuan')->default(0);
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
        Schema::dropIfExists('mindik');
    }
}
