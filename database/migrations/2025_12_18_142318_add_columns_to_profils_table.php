<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // PERUBAHAN: Menggunakan 'create', bukan 'table'
        Schema::create('profils', function (Blueprint $table) {
            $table->id(); // Menambahkan Primary Key (Wajib untuk tabel baru)
            
            // Kolom-kolom data profil
            $table->string('nama_kelurahan')->nullable();
            $table->text('alamat')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('sejarah')->nullable();

            $table->timestamps(); // Menambahkan kolom created_at dan updated_at (Standar Laravel)
        });
    }

    public function down()
    {
        // PERUBAHAN: Menghapus tabel jika di-rollback
        Schema::dropIfExists('profils');
    }
};