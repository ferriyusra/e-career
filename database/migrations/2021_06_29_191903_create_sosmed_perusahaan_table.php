<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosmedPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosmed_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('perusahaan_id');
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('url_sosial_media')->unique();
            $table->string('jenis_sosial_media');
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
        Schema::dropIfExists('sosmed_perusahaan');
    }
}
