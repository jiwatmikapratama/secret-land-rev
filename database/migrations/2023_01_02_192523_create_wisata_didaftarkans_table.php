<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata_didaftarkans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar');
            $table->bigInteger('fk_id_desa')->unsigned();
            $table->timestamps();
            $table->foreign('fk_id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->bigInteger('fk_id_kategori')->unsigned();
            $table->foreign('fk_id_kategori')->references('id')->on('kategoris');
            $table->text('deskripsi');
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata_didaftarkans');
    }
};
