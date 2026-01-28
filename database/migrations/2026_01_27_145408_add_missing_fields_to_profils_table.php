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
            $table->integer('jumlah_rt')->nullable()->after('sejarah');
            $table->integer('jumlah_rw')->nullable()->after('jumlah_rt');
            $table->integer('jumlah_laki_laki')->nullable()->after('jumlah_rw');
            $table->integer('jumlah_perempuan')->nullable()->after('jumlah_laki_laki');
            $table->integer('jumlah_kk')->nullable()->after('jumlah_perempuan');
            $table->text('demografi_deskripsi')->nullable()->after('jumlah_kk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profils', function (Blueprint $table) {
            // Hanya field yang sudah ada sebelumnya
            $table->dropColumn(['jumlah_rt', 'jumlah_rw']);
        });
    }
};
