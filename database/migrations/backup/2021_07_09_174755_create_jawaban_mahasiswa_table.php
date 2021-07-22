<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_mahasiswa', function (Blueprint $table) {
            $table->increments('id');

            // $table->unsignedInteger('id_soal');
            // $table->foreign('id_soal')->references('id')->on('soal_kuisioner');
            // $table->unsignedInteger('id_jawaban')->nullable();;
            // $table->foreign('id_jawaban')->references('id')->on('kuisioner_jawaban');

            $table->string('soal_kuisioner');
            $table->string('jawaban_pilihan');
            $table->string('jawaban_essai');
            $table->string('nama_mahasiswa');
            $table->string('npm');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik');
            $table->string('npwp');
            $table->string('no_hp');
            $table->string('email');
            $table->string('tahun_lulus');
            $table->string('program_studi');
            $table->timestamps();
        });
    }
    // public function up()
    // {
    //     Schema::create('jawaban_mahasiswa', function (Blueprint $table) {
    //         $table->increments('id');

    //         // $table->unsignedInteger('id_soal');
    //         // $table->foreign('id_soal')->references('id')->on('soal_kuisioner');
    //         // $table->unsignedInteger('id_jawaban')->nullable();;
    //         // $table->foreign('id_jawaban')->references('id')->on('kuisioner_jawaban');

    //         $table->string('soal_kuisioner');
    //         $table->string('jawaban_pilihan');
    //         $table->string('jawaban_essai');
    //         $table->string('nama_mahasiswa');
    //         $table->string('npm');
    //         $table->string('tempat_lahir');
    //         $table->date('tanggal_lahir');
    //         $table->string('nik');
    //         $table->string('npwp');
    //         $table->string('no_hp');
    //         $table->string('email');
    //         $table->string('tahun_lulus');
    //         $table->string('program_studi');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_mahasiswa');
    }
}
