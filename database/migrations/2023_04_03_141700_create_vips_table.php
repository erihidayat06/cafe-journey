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
            $table->boolean('ac')->default(0);
            $table->boolean('tv')->default(0);
            $table->boolean('proyektor')->default(0);
            $table->boolean('papan_tulis')->default(0);
            $table->boolean('meja')->default(0);
            $table->boolean('kursi')->default(0);
            $table->integer('kapasitas');
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
