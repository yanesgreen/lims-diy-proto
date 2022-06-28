<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitkerjaToTakah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('takah', function (Blueprint $table) {
            $table->unsignedBigInteger('unitkerja_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('takah', function (Blueprint $table) {
            $table->dropColumn('unitkerja_id');
        });
    }
}
