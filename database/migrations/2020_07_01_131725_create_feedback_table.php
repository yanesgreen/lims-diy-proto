<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('takah_id');
            $table->tinyInteger('pertanyaan1')->nullable();
            $table->tinyInteger('pertanyaan2')->nullable();
            $table->tinyInteger('pertanyaan3')->nullable();
            $table->tinyInteger('pertanyaan4')->nullable();
            $table->tinyInteger('pertanyaan5')->nullable();
            $table->tinyInteger('pertanyaan6')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
