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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->time('senin_buka');
            $table->time('senin_tutup');
            $table->time('selasa_buka');
            $table->time('selasa_tutup');
            $table->time('rabu_buka');
            $table->time('rabu_tutup');
            $table->time('kemis_buka');
            $table->time('kemis_tutup');
            $table->time('jumat_buka');
            $table->time('jumat_tutup');
            $table->time('sabtu_buka');
            $table->time('sabtu_tutup');
            $table->time('minggu_buka');
            $table->time('minggu_tutup');
            $table->enum('opsi', ['buka', 'tutup']);
            $table->foreignId('cafe_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
