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
        Schema::table('vips', function (Blueprint $table) {
            $table->enum('fasilitas', ['ac', 'proyektor', 'tv', 'papan tulis', 'meja', 'kursi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vips', function (Blueprint $table) {
            $table->dropColumn('fasilitas');
        });
    }
};
