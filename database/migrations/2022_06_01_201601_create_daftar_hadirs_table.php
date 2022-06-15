<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarHadirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_hadirs', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->foreign('npm')->references('npm')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('seminar_proposal_id')->references('id')->on('ujians')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('daftar_hadirs');
    }
}
