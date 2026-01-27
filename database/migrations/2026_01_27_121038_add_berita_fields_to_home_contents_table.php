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
            $table->string('berita_title')->nullable();
            $table->string('berita_link_text')->nullable();
            $table->string('berita_tab_terkini')->nullable();
            $table->string('berita_tab_populer')->nullable();
            $table->string('berita_featured_title')->nullable();
            $table->text('berita_featured_desc')->nullable();
            $table->string('berita_featured_image')->nullable();
            $table->string('berita_featured_label')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn([
                'berita_title',
                'berita_link_text',
                'berita_tab_terkini',
                'berita_tab_populer',
                'berita_featured_title',
                'berita_featured_desc',
                'berita_featured_image',
                'berita_featured_label'
            ]);
        });
    }
};
