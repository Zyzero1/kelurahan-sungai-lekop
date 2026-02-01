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
            // Informasi Umum - hanya tambahkan jika belum ada
            if (!Schema::hasColumn('profils', 'kode_pos')) {
                $table->string('kode_pos')->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('profils', 'luas_wilayah')) {
                $table->string('luas_wilayah')->nullable()->after('kode_pos');
            }

            // Pimpinan & Identitas
            if (!Schema::hasColumn('profils', 'nama_lurah')) {
                $table->string('nama_lurah')->nullable()->after('demografi_deskripsi');
            }
            if (!Schema::hasColumn('profils', 'nip_lurah')) {
                $table->string('nip_lurah')->nullable()->after('nama_lurah');
            }
            if (!Schema::hasColumn('profils', 'foto_lurah')) {
                $table->string('foto_lurah')->nullable()->after('nip_lurah');
            }
            if (!Schema::hasColumn('profils', 'email')) {
                $table->string('email')->nullable()->after('foto_lurah');
            }
            if (!Schema::hasColumn('profils', 'telepon')) {
                $table->string('telepon')->nullable()->after('email');
            }
            if (!Schema::hasColumn('profils', 'motto_lurah')) {
                $table->text('motto_lurah')->nullable()->after('telepon');
            }

            // Struktur
            if (!Schema::hasColumn('profils', 'struktur')) {
                $table->string('struktur')->nullable()->after('motto_lurah');
            }
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
