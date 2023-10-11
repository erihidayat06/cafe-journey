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
        Schema::create('cafe', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cafe');
            $table->string('gambar_logo');
            $table->string('gambar_profil');
            $table->string('alamat');
            $table->string('map');
            $table->string('deskripsi');
            $table->integer('no_telepon');
            $table->foreignId('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafe');
    }
};
