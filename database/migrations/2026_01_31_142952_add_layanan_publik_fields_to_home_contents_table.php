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
            // Layanan Publik Section
            $table->string('layanan_publik_title')->nullable()->after('statistik_layanan');
            $table->text('layanan_publik_desc')->nullable()->after('layanan_publik_title');

            // Service toggles
            $table->boolean('layanan_kk_baru')->default(true)->after('layanan_publik_desc');
            $table->boolean('layanan_nikah')->default(true)->after('layanan_kk_baru');
            $table->boolean('layanan_akte_lahir')->default(true)->after('layanan_nikah');
            $table->boolean('layanan_akte_mati')->default(true)->after('layanan_akte_lahir');
            $table->boolean('layanan_uang_duka')->default(true)->after('layanan_akte_mati');
            $table->boolean('layanan_tambah_anak')->default(true)->after('layanan_uang_duka');
            $table->boolean('layanan_sktm')->default(true)->after('layanan_tambah_anak');
            $table->boolean('layanan_bpjs')->default(true)->after('layanan_sktm');
            $table->boolean('layanan_sku')->default(true)->after('layanan_bpjs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn([
                'layanan_publik_title',
                'layanan_publik_desc',
                'layanan_kk_baru',
                'layanan_nikah',
                'layanan_akte_lahir',
                'layanan_akte_mati',
                'layanan_uang_duka',
                'layanan_tambah_anak',
                'layanan_sktm',
                'layanan_bpjs',
                'layanan_sku'
            ]);
        });
    }
};
