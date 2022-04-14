<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->foreign('npm')->references('npm')->on('mahasiswas');
            $table->date('tanggal_sempro');
            $table->time('jam')->nullable();
            $table->string('ruang')->nullable();
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
        Schema::dropIfExists('seminar_proposals');
    }
}
