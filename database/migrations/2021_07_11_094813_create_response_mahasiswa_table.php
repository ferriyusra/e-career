<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_mahasiswa', function (Blueprint $table) {
            $table->increments('id');
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
            // $table->increments('id');
            // $table->string('nama_mahasiswa')->unique();
            // $table->string('npm_mahasiswa')->unique();
            // $table->string('tempat_lahir_mahasiswa');
            // $table->date('tgl_lahir_mahasiswa');
            // $table->string('nik_mahasiswa')->unique();
            // $table->string('npwp_mahasiswa');
            // $table->string('no_telp_mahasiswa')->unique();
            // $table->string('email_mahasiswa')->unique();
            // $table->string('tahun_lulus');
            // $table->string('program_studi');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response_mahasiswa');
    }
}
