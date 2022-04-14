<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTableMahasiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->foreign('pembimbing_1')->references('nip')->on('dosens');
            $table->foreign('pembimbing_2')->references('nip')->on('dosens');
            $table->foreign('penguji_1')->references('nip')->on('dosens');
            $table->foreign('penguji_2')->references('nip')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropForeign('pembimbing_1')->references('nip')->on('dosens');
            $table->dropForeign('pembimbing_2')->references('nip')->on('dosens');
            $table->dropForeign('penguji_1')->references('nip')->on('dosens');
            $table->dropForeign('penguji_2')->references('nip')->on('dosens');
        });
    }
}
