# Jelajah Lekop - Setup Instructions

## Overview
Sistem "Jelajah Lekop" adalah sistem manajemen konten dinamis untuk halaman layanan website Kelurahan Sungai Lekop. Sistem ini menggantikan menu "Layanan" di admin menjadi "Jelajah Lekop" dengan konten yang lengkap dan dinamis.

## Fitur
- **Sentra Industri**: Informasi tentang sentra industri kerupuk dan produk unggulan
- **Fasilitas**: Data fasilitas umum (Puskesmas, Posyandu, SD, SMP, SMA, Masjid, Surau, TPA/TPQ)
- **UMKM Lokal**: Database UMKM dengan produk, harga, dan kontak
- **Galeri Kegiatan**: Dokumentasi kegiatan kemasyarakatan, pemerintahan, pembangunan, dan UMKM

## Setup Instructions

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Run Seeder (untuk data awal)
```bash
php artisan db:seed --class=JelajahLekopSeeder
```

### 3. Upload Images
Upload gambar-gambar berikut ke folder `public/uploads/jelajah-lekop/`:

**Sentra Industri:**
- sentra-industri-1.jpg
- produksi-kerupuk.jpg
- tugu-kerupuk.jpg

**Fasilitas:**
- fasilitas-1.jpg (Puskesmas)
- fasilitas-2.jpg (Posyandu)
- fasilitas-3.jpg (SDN 011)
- fasilitas-4.jpg (SDN 015)
- fasilitas-5.jpg (SMP)
- fasilitas-6.jpg (SMK)
- fasilitas-7.jpg (Masjid Al-Kautsar)
- fasilitas-8.jpg (Surau Al-Ikhlas)
- fasilitas-9.jpg (TPA Al-Hikmah)

**UMKM:**
- umkm-1.jpg, umkm-1-1.jpg, umkm-1-2.jpg, umkm-1-3.jpg (Kerupuk Pak Haji)
- umkm-2.jpg, umkm-2-1.jpg, umkm-2-2.jpg, umkm-2-3.jpg (Ibu Sumi's Snack)
- umkm-3.jpg, umkm-3-1.jpg, umkm-3-2.jpg, umkm-3-3.jpg (Toko Rajawali)
- umkm-4.jpg, umkm-4-1.jpg, umkm-4-2.jpg, umkm-4-3.jpg (Salon Ibu Rina)
- umkm-5.jpg, umkm-5-1.jpg, umkm-5-2.jpg, umkm-5-3.jpg (Bengkel Jaya Makmur)
- umkm-6.jpg, umkm-6-1.jpg, umkm-6-2.jpg, umkm-6-3.jpg (Warung Bu Narti)

**Galeri Kegiatan:**
- galeri-1.jpg (Rapat Desa)
- galeri-2.jpg (Musrenbang)
- galeri-3.jpg (Gotong Royong)
- galeri-4.jpg (Pengajian Rutin)
- galeri-5.jpg (Pembangunan Jalan)
- galeri-6.jpg (Produksi Kerupuk)

## Cara Menggunakan Admin

### Mengakses Menu Jelajah Lekop
1. Login ke admin panel
2. Klik menu "Jelajah Lekop" di sidebar
3. Anda akan melihat semua data yang dikelompokkan berdasarkan tipe

### Menambah Data Baru
1. Klik tombol "Tambah Data"
2. Pilih tipe (Sentra Industri, Fasilitas, UMKM, atau Galeri Kegiatan)
3. Isi form sesuai dengan tipe yang dipilih:
   - **Sentra Industri**: Icon, highlight, lokasi spesifik, produk unggulan
   - **Fasilitas**: Icon, warna label, kontak, jam operasional
   - **UMKM**: Icon, badge, produk, harga, pemilik, telepon, tahun berdiri, keunikan
   - **Galeri Kegiatan**: Kategori galeri, tanggal, deskripsi singkat
4. Upload gambar utama dan/atau galeri (multiple images)
5. Klik "Simpan Data"

### Mengedit Data
1. Klik tombol edit (ikon pensil) pada data yang ingin diubah
2. Ubah informasi yang diperlukan
3. Upload ulang gambar jika perlu
4. Klik "Update Data"

### Menghapus Data
1. Klik tombol hapus (ikon trash) pada data yang ingin dihapus
2. Konfirmasi penghapusan

### Filter dan Pencarian
- Gunakan filter "Tipe" untuk menampilkan data berdasarkan kategori
- Untuk Fasilitas dan Galeri, ada filter tambahan "Kategori"
- Data otomatis di-group berdasarkan tipe

## Struktur Database

### Tabel: jelajah_lekops
- `id`: Primary key
- `tipe`: sentra_industri, fasilitas, umkm, galeri_kegiatan
- `kategori`: kategori spesifik (untuk fasilitas dan galeri)
- `nama`: nama item
- `deskripsi`: deskripsi lengkap
- `lokasi`: lokasi/geografis
- `gambar`: nama file gambar utama
- `galeri`: array nama file galeri (JSON)
- `detail`: data tambahan spesifik per tipe (JSON)
- `status`: aktif/nonaktif
- `urutan`: nomor urutan untuk sorting
- `created_at`, `updated_at`: timestamps

## Frontend Integration

Halaman layanan (`/layanan`) sekarang menggunakan data dinamis dari database:
- Hero section tetap statis
- Semua konten diambil dari database melalui `JelajahLekopController`
- Data dikelompokkan dan ditampilkan sesuai dengan desain asli
- Galeri kegiatan memiliki filter kategori
- Fasilitas memiliki filter kategori dan pencarian

## Troubleshooting

### Gambar tidak muncul
Pastikan:
1. File gambar sudah diupload ke `public/uploads/jelajah-lekop/`
2. Nama file sesuai dengan yang ada di database
3. Folder permissions sudah benah

### Data tidak muncul di frontend
Pastikan:
1. Seeder sudah dijalankan
2. Status data = 'aktif'
3. Route sudah benar (cek di routes/web.php)

### Error 404 di admin
Pastikan:
1. Route sudah terdaftar dengan benar
2. Controller sudah ada
3. User sudah login dan memiliki akses

## Customization

### Menambah Kategori Baru
1. Update `getKategoriOptions()` di `JelajahLekopController`
2. Update form di view `create.blade.php` dan `edit.blade.php`
3. Update frontend view untuk menampilkan kategori baru

### Menambah Field Detail Baru
1. Update validation di controller
2. Tambah field di form create/edit
3. Update model accessor jika perlu
4. Update frontend view untuk menampilkan field baru

## Support
Jika ada masalah atau pertanyaan, hubungi developer atau cek log Laravel untuk error details.
