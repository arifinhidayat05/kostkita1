<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kost_id');
            $table->unsignedBigInteger('pelanggan_id'); // FK ke pelanggan.user_id
            $table->tinyInteger('rating'); // 1–5
            $table->text('komentar')->nullable();
            $table->timestamps();

            $table->foreign('kost_id')->references('kost_id')->on('kost')->onDelete('cascade');
            $table->foreign('pelanggan_id')->references('user_id')->on('pelanggan')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
