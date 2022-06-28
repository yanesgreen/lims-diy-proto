<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeteranganPpnsToAsaltakah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asaltakah', function (Blueprint $table) {
            $table->string('keterangan_ppns')->nullable();
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
            $table->dropColumn('keterangan_ppns');
        });
    }
}
