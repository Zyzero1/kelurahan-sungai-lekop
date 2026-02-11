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
        Schema::create('jelajah_lekops', function (Blueprint $table) {
            $table->id();
            $table->string('tipe'); // sentra_industri, fasilitas, umkm, galeri_kegiatan
            $table->string('kategori')->nullable(); // untuk fasilitas: puskesmas, posyandu, sd, smp, sma, masjid, surau, tpa
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('lokasi')->nullable();
            $table->string('gambar')->nullable();
            $table->json('galeri')->nullable(); // untuk multiple images
            $table->json('detail')->nullable(); // untuk data tambahan seperti produk, unik, harga, dll
            $table->string('status')->default('aktif'); // aktif, nonaktif
            $table->integer('urutan')->default(0); // untuk sorting
            $table->timestamps();
            
            $table->index(['tipe', 'status']);
            $table->index(['tipe', 'kategori']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jelajah_lekops');
    }
};
