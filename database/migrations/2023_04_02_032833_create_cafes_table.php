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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cafe');
            $table->string('gambar_logo');
            $table->string('gambar_profil');
            $table->string('alamat');
            $table->string('map');
            $table->string('deskripsi');
            $table->enum('domisili', ['Kota Tegal', 'Kab Tegal']);
            $table->enum('kecamatan', [
                'margasari', 'bumijawa', 'bojong', 'balapulang', 'pagerbarang',
                'lebaksiu', 'jatinegara', 'kedungbanteng', 'pangkah', 'slawi', 'dukuhwaru', 'adiwerna',
                'dukuhturi', 'talang', 'tarub', 'kramat', 'suradadi', 'warureja', 'margadana',
                'tegal barat', 'tegal selatan', 'tegal timur'
            ]);
            $table->string('whatsapp');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('wallet')->nullable();
            $table->string('no_wallet')->nullable();
            $table->string('no_antrian');
            $table->enum('konfirmasi', ['tunggu', 'konfirmasi']);
            $table->string('slug');
            $table->foreignId('user_id');
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
