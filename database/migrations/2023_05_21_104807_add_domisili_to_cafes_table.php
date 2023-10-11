<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $table = 'utilizadores';
    public function up(): void
    {

        Schema::table('cafe', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cafes', function (Blueprint $table) {
            $table->dropColumn('domisili');
            $table->dropColumn('whatsapp');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
        });
    }
};
