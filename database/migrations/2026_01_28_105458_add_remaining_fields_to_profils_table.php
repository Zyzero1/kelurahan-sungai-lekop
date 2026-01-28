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
        Schema::table('profils', function (Blueprint $table) {
            // Informasi Umum
            $table->string('kode_pos')->nullable()->after('alamat');
            $table->string('luas_wilayah')->nullable()->after('kode_pos');

            // Pimpinan & Identitas
            $table->string('nama_lurah')->nullable()->after('demografi_deskripsi');
            $table->string('nip_lurah')->nullable()->after('nama_lurah');
            $table->string('foto_lurah')->nullable()->after('nip_lurah');
            $table->string('email')->nullable()->after('foto_lurah');
            $table->string('telepon')->nullable()->after('email');
            $table->text('motto_lurah')->nullable()->after('telepon');

            // Struktur
            $table->string('struktur')->nullable()->after('motto_lurah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            $table->dropColumn([
                'kode_pos',
                'luas_wilayah',
                'nama_lurah',
                'nip_lurah',
                'foto_lurah',
                'email',
                'telepon',
                'motto_lurah',
                'struktur'
            ]);
        });
    }
};
