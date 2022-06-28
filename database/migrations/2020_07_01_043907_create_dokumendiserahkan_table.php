<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumendiserahkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumendiserahkan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('takah_id');
            $table->boolean('bap_laboratoris');
            $table->boolean('bb_diserahkan');
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
        Schema::dropIfExists('dokumendiserahkan');
    }
}
