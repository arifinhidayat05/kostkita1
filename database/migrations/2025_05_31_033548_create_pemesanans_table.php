<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('pemesanan_id');
            $table->dateTime('tanggal_masuk')->nullable();
            $table->date('tanggal_pesan')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->enum('status_pemesanan', ['diterima', 'dibatalkan', 'ditolak', 'belum di proses'])->default('belum di proses');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->timestamps();

            // Foreign key constraints (optional, jika ada relasi)
            $table->foreign('user_id')->references('user_id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kamar_id')->references('kamar_id')->on('kamar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
