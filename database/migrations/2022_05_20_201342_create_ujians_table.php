<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->string('npm', 9);
            $table->foreign('npm')->references('npm')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('jenis', ['Seminar Proposal', 'Seminar Hasil', 'Sidang Skripsi']);
            $table->date('tanggal');
            $table->time('jam');
            $table->string('ruang', 60);
            $table->string('nilai', 10)->nullable();
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
        Schema::dropIfExists('ujians');
    }
}
