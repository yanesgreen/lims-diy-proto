<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTakahLengkapAtToTakah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('takah', function (Blueprint $table) {
            $table->timestamp('takah_lengkap_at')->nullable();
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
            $table->dropColumn('takah_lengkap_at');
        });
    }
}
