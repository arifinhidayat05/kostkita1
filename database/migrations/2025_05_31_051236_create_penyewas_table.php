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
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->enum('status', ['aktif', 'selesai'])->default('aktif');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kamar_id')->references('kamar_id')->on('kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewa');
    }
};
