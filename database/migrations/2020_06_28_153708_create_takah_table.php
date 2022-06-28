<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takah', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 25)->nullable();
            $table->string('foto_bb')->nullable();
            $table->string('dibuka_oleh')->nullable();
            $table->unsignedBigInteger('penyidik_id')->nullable();
            $table->unsignedBigInteger('penyidikpenerima_id')->nullable();
            $table->unsignedBigInteger('detailpermintaan_id')->nullable();
            $table->unsignedBigInteger('asaltakah_id')->nullable();
            $table->unsignedBigInteger('urtu_id')->nullable();
            $table->unsignedBigInteger('statustakah_id')->nullable();
            $table->unsignedBigInteger('jeniskasus_id')->nullable();
            $table->unsignedBigInteger('mindik_id')->nullable();
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->unsignedBigInteger('subbidang_id')->nullable();
            $table->unsignedBigInteger('editor_id')->nullable();
            $table->boolean('editable')->nullable();
            $table->boolean('kasus_menonjol')->default(0);
            $table->boolean('pemeriksaan_tkp')->default(0);
            $table->boolean('synced')->default(0);
            $table->tinyInteger('tahap')->nullable();
            $table->timestamp('diserahkan_ke_kaurmin_at')->nullable();
            $table->timestamp('siap_diserahkan_ke_urtu_at')->nullable();
            $table->timestamp('diserahkan_ke_urtu_at')->nullable();
            $table->timestamp('siap_diserahkan_ke_penyidik_at')->nullable();
            $table->timestamp('diserahkan_ke_penyidik_at')->nullable();
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
        Schema::dropIfExists('takah');
    }
}
