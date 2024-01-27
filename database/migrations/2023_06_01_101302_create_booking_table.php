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
        Schema::create('Bookings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_booking')->default(null);
            $table->time('jam_booking')->default(null);
            $table->enum('opsi', ['tunggu', 'sukses', 'selesai']);
            $table->string('no_pesanan', 20);
            $table->string('bukti');
            $table->foreignId('user_id');
            $table->foreignId('vip_id');
            $table->foreignId('cafe_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Bookings');
    }
};
