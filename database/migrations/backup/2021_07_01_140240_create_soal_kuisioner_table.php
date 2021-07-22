<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalKuisionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_kuisioner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soal_kuisioner');
            $table->boolean('tipe_soal');
            $table->boolean('jawaban_lain');
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
        Schema::dropIfExists('soal_kuisioner');
    }
}
