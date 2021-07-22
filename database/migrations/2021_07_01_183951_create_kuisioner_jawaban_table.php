<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisionerJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisioner_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_kuisioner');
            $table->foreign('id_kuisioner')->references('id')->on('soal_kuisioner')->onDelete('cascade')->onUpdate('cascade');;
            $table->string('jawaban');
            $table->timestamps();
            // $table->increments('id');
            // $table->unsignedInteger('id_kuisioner');
            // $table->foreign('id_kuisioner')->references('id')->on('soal_kuisioner');
            // $table->string('jawaban');
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
        Schema::dropIfExists('kuisioner_jawaban');
    }
}
