<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTracer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_tracer', function (Blueprint $table) {
            $table->increments('id');

            $table->string('soal_kuisioner');
            $table->string('jawaban_pilihan');
            $table->string('jawaban_essai');
            $table->string('nama_mahasiswa');
            $table->string('npm_mahasiswa');
            $table->string('tempat_lahir_mahasiswa');
            $table->date('tgl_lahir_mahasiswa');
            $table->string('nik_mahasiswa');
            $table->string('npwp_mahasiswa');
            $table->string('no_telp_mahasiswa');
            $table->string('email_mahasiswa');
            $table->string('tahun_lulus');
            $table->string('program_studi');
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
        Schema::dropIfExists('answer_tracer');
    }
}
