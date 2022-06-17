<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('npm', 9)->primary();
            $table->string('nama', 100);
            $table->string('judul', 255);
            $table->string('pembimbing_1', 18)->nullable();
            $table->string('pembimbing_2', 18)->nullable();
            $table->string('penguji_1', 18)->nullable();
            $table->string('penguji_2', 18)->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
}
