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
        Schema::table('cafe', function (Blueprint $table) {
            $table->string('bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('wallet')->nullable();
            $table->string('no_wallet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cafe', function (Blueprint $table) {
            $table->dropColumn('bank');
            $table->dropColumn('no_rekening');
            $table->dropColumn('wallet');
            $table->dropColumn('no_wallet');
        });
    }
};
