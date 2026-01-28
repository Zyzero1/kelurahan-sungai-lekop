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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();

            // Hero Banner
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_button1_text')->nullable();
            $table->string('hero_button1_link')->nullable();
            $table->string('hero_button2_text')->nullable();
            $table->string('hero_button2_link')->nullable();

            // Profil Singkat
            $table->text('profil_tentang')->nullable();
            $table->string('profil_alamat')->nullable();
            $table->string('profil_email')->nullable();
            $table->string('profil_instagram')->nullable();
            $table->text('profil_visi')->nullable();
            $table->text('profil_misi')->nullable();

            // Statistik
            $table->integer('statistik_penduduk')->default(0);
            $table->integer('statistik_rt')->default(0);
            $table->integer('statistik_rw')->default(0);
            $table->integer('statistik_layanan')->default(0);

            // Jelajah Lekop
            $table->string('jelajah_fasilitas_title')->nullable();
            $table->text('jelajah_fasilitas_desc')->nullable();
            $table->string('jelajah_umkm_title')->nullable();
            $table->text('jelajah_umkm_desc')->nullable();
            $table->string('jelajah_wisata_title')->nullable();
            $table->text('jelajah_wisata_desc')->nullable();

            // Testimonial
            $table->text('testimonial_text')->nullable();
            $table->string('testimonial_author')->nullable();

            // Social Media Links
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_youtube')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
