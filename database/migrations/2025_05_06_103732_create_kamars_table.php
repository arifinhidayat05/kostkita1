<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('kamar_id');
            $table->string('nama_kamar');
            $table->text('fasilitas');
            $table->decimal('harga', 10, 2);
            $table->enum('status_kamar', ['tersedia', 'tidak tersedia']);
            $table->string('deskripsi');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kost_id');
            $table->foreign('kost_id')->references('kost_id')->on('kost')->onDelete('cascade')->on('kost')->onUpdate('cascade');;
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
