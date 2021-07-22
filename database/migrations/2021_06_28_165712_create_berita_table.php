<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori_berita')->onDelete('cascade')->onUpdate('cascade');

            $table->string('judul_berita');
            $table->string('slug');
            $table->text('isi_berita');
            $table->text('gambar');
            
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
        Schema::dropIfExists('berita');
    }
}
