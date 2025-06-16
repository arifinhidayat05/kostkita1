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
        Schema::create('kost', function (Blueprint $table) {
            $table->id('kost_id');
            $table->unsignedBigInteger('pemilik_id'); // FK ke tabel pemilik
            $table->string('nama_kost');
            $table->text('alamat');
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('No_Wa')->nullable();
            $table->string('Email')->nullable();
            $table->string('Telepon')->nullable();
            $table->enum('kategori', ['putra', 'putri', 'campur']);
            $table->string('gambar')->nullable();
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('pemilik_id')->references('id')->on('pemilik')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kost');
    }
};
