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
        Schema::table('jelajah_lekops', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('gambar');
            $table->text('hero_content')->nullable()->after('hero_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jelajah_lekops', function (Blueprint $table) {
            $table->dropColumn(['hero_image', 'hero_content']);
        });
    }
};
