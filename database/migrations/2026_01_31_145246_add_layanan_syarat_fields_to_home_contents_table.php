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
        Schema::table('home_contents', function (Blueprint $table) {
            // Persyaratan Layanan Publik
            $table->text('layanan_kk_baru_syarat')->nullable()->after('layanan_sku');
            $table->text('layanan_nikah_syarat')->nullable()->after('layanan_kk_baru_syarat');
            $table->text('layanan_akte_lahir_syarat')->nullable()->after('layanan_nikah_syarat');
            $table->text('layanan_akte_mati_syarat')->nullable()->after('layanan_akte_lahir_syarat');
            $table->text('layanan_uang_duka_syarat')->nullable()->after('layanan_akte_mati_syarat');
            $table->text('layanan_tambah_anak_syarat')->nullable()->after('layanan_uang_duka_syarat');
            $table->text('layanan_sktm_syarat')->nullable()->after('layanan_tambah_anak_syarat');
            $table->text('layanan_bpjs_syarat')->nullable()->after('layanan_sktm_syarat');
            $table->text('layanan_sku_syarat')->nullable()->after('layanan_bpjs_syarat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn([
                'layanan_kk_baru_syarat',
                'layanan_nikah_syarat',
                'layanan_akte_lahir_syarat',
                'layanan_akte_mati_syarat',
                'layanan_uang_duka_syarat',
                'layanan_tambah_anak_syarat',
                'layanan_sktm_syarat',
                'layanan_bpjs_syarat',
                'layanan_sku_syarat'
            ]);
        });
    }
};
