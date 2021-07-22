<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loker', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('perusahaan_id');
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan');

            $table->text('lokasi_detail_lowongan');
            $table->text('deskripsi_lowongan');
            $table->text('posisi_lowongan');
            $table->string('tipe_pekerjaan');
            $table->text('kualifikasi_lowongan');
            $table->text('cara_melamar');
            $table->string('rentang_gaji_min');
            $table->string('rentang_gaji_max');
            $table->date('pendaftaran_mulai');
            $table->date('pendaftaran_akhir');
            $table->string('url_lamaran');
            $table->string('slug');

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
        Schema::dropIfExists('loker');
    }
}
