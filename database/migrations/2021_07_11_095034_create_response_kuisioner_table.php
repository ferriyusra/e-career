<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseKuisionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_kuisioner', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('response_mahasiswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('soal_kuisioner');
            $table->string('jawaban');
            $table->timestamps();
            // $table->id();
            // $table->unsignedInteger('id_mhs');
            // $table->foreign('id_mhs')->references('id')->on('response_mahasiswa')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('soal_kuisioner');
            // $table->string('jawaban_response');
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
        Schema::dropIfExists('response_kuisioner');
    }
}
