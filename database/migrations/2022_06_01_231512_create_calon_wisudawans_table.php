<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonWisudawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_wisudawans', function (Blueprint $table) {
            $table->id();
            $table->string('npm', 9);
            $table->foreign('npm')->references('npm')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('arsip', 50);
            $table->string('hal_pengesahan', 50);
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
        Schema::dropIfExists('calon_wisudawans');
    }
}
