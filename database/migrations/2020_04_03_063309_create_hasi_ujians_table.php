<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasiUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasi_ujians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa', 100);
            $table->string('kelas', 10);
            $table->string('nomor_soal', 100);
            $table->string('soal', 100);
            $table->string('jawaban', 100);
            $table->string('keyakinan_jawaban', 100);
            $table->string('alasan', 100);
            $table->string('keyakinan_alasan', 100);
            $table->string('status_jawaban', 100);
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
        Schema::dropIfExists('hasi_ujians');
    }
}