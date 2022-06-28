<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangbuktiTakahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangbukti_takah', function (Blueprint $table) {
            $table->integer('takah_id');
            $table->integer('barangbukti_id');
            $table->primary(['takah_id', 'barangbukti_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangbukti_takah');
    }
}
