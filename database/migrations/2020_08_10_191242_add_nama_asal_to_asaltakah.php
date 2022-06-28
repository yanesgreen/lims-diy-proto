<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaAsalToAsaltakah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asaltakah', function (Blueprint $table) {
            $table->string('nama_asal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asaltakah', function (Blueprint $table) {
            $table->dropColumn('nama_asal');
        });
    }
}
