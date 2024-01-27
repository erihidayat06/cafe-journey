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
        Schema::create('vips', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->enum('fasilitas', ['ac', 'proyektor', 'tv', 'papan tulis', 'meja', 'kursi']);
            $table->integer('kapasitas');
            $table->integer('harga');
            $table->foreignId('cafe_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vips');
    }
};
