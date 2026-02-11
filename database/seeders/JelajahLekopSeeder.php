<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JelajahLekop;
use Illuminate\Support\Str;

class JelajahLekopSeeder extends Seeder
{
    public function run(): void
    {
        // Sentra Industri Data
        JelajahLekop::create([
            'tipe' => 'sentra_industri',
            'nama' => 'Kampung Kerupuk: Legenda Rasa dari Bintan',
            'deskripsi' => 'Sungai Lekop dikenal luas sebagai pusat produksi Kerupuk Ikan & Atom berbahan dasar Ikan Tenggiri dan Tamban segar. Terpusat di kawasan Perumahan Griya Indo Kencana dan sepanjang Jl. Korindo, industri rumahan ini telah menembus pasar ekspor.',
            'lokasi' => 'Kawasan Korindo & Griya Indo Kencana',
            'gambar' => 'sentra-industri-1.jpg',
            'galeri' => ['produksi-kerupuk.jpg', 'tugu-kerupuk.jpg'],
            'detail' => [
                'ikon' => 'fa-industry',
                'highlight' => 'Produk Unggulan Daerah',
                'lokasi_spesifik' => 'Kawasan Korindo & Griya Indo Kencana',
                'produk_unggulan' => ['Kerupuk Ikan Tenggiri', 'Kerupuk Atom', 'Kerupuk Udang']
            ],
            'status' => 'aktif',
            'urutan' => 1,
        ]);

        // Fasilitas Data
        $fasilitasData = [
            [
                'kategori' => 'puskesmas',
                'nama' => 'Puskesmas Pembantu Sungai Lekop',
                'deskripsi' => 'Fasilitas kesehatan utama melayani kebutuhan medis dasar warga Sungai Lekop.',
                'lokasi' => 'Jl. Poros Km 20, Sungai Lekop',
                'detail' => [
                    'ikon' => 'fa-hospital',
                    'warna_label' => 'bg-red-100 text-red-800',
                    'kontak' => '0812-3456-7890',
                    'jam_operasional' => '08:00 - 16:00'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'posyandu',
                'nama' => 'Posyandu Melati',
                'deskripsi' => 'Pelayanan kesehatan ibu dan balita, pemantauan tumbuh kembang anak.',
                'lokasi' => 'Perumahan Griya Indo Kencana',
                'detail' => [
                    'ikon' => 'fa-baby',
                    'warna_label' => 'bg-green-100 text-green-800',
                    'kontak' => '0813-6789-0123',
                    'jam_operasional' => '09:00 - 11:00'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'sd',
                'nama' => 'SDN 011 Bintan Timur',
                'deskripsi' => 'Sekolah dasar unggulan di Km 20, mencetak generasi berkualitas dan berprestasi.',
                'lokasi' => 'Km 20 (Pusat Kota)',
                'detail' => [
                    'ikon' => 'fa-school',
                    'warna_label' => 'bg-blue-100 text-blue-800',
                    'kontak' => '0814-5678-1234',
                    'jam_operasional' => '07:00 - 13:00'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'sd',
                'nama' => 'SDN 015 Bintan Timur',
                'deskripsi' => 'Sekolah dasar di Jl. Korindo, dekat dengan sentra industri kerupuk.',
                'lokasi' => 'Jl. Korindo',
                'detail' => [
                    'ikon' => 'fa-school',
                    'warna_label' => 'bg-blue-100 text-blue-800',
                    'kontak' => '0815-8901-2345',
                    'jam_operasional' => '07:00 - 13:00'
                ],
                'urutan' => 2,
            ],
            [
                'kategori' => 'smp',
                'nama' => 'SMP Negeri 1 Bintan Timur',
                'deskripsi' => 'Sekolah menengah pertama terdekat dengan fasilitas lengkap dan berkualitas.',
                'lokasi' => 'Jl. Poros Km 22',
                'detail' => [
                    'ikon' => 'fa-graduation-cap',
                    'warna_label' => 'bg-purple-100 text-purple-800',
                    'kontak' => '0816-2345-6789',
                    'jam_operasional' => '07:00 - 14:00'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'sma',
                'nama' => 'SMK Negeri 1 Bintan',
                'deskripsi' => 'Sekolah menengah kejuruan dengan berbagai program keahlian terkini.',
                'lokasi' => 'Kota Tanjungpinang',
                'detail' => [
                    'ikon' => 'fa-university',
                    'warna_label' => 'bg-orange-100 text-orange-800',
                    'kontak' => '0817-3456-7890',
                    'jam_operasional' => '07:00 - 15:00'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'masjid',
                'nama' => 'Masjid Al-Kautsar',
                'deskripsi' => 'Masjid utama di Perumahan Griya Indo Kencana, pusat kegiatan keagamaan.',
                'lokasi' => 'Perumahan Griya Indo Kencana',
                'detail' => [
                    'ikon' => 'fa-mosque',
                    'warna_label' => 'bg-emerald-100 text-emerald-800',
                    'kontak' => '0818-4567-8901',
                    'jam_operasional' => 'Buka 24 Jam'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'surau',
                'nama' => 'Surau Al-Ikhlas',
                'deskripsi' => 'Surau kecil untuk sholat berjamaah dan kegiatan keagamaan harian.',
                'lokasi' => 'Kawasan Perumahan',
                'detail' => [
                    'ikon' => 'fa-pray',
                    'warna_label' => 'bg-indigo-100 text-indigo-800',
                    'kontak' => '-',
                    'jam_operasional' => 'Buka 24 Jam'
                ],
                'urutan' => 1,
            ],
            [
                'kategori' => 'tpa',
                'nama' => 'TPA Al-Hikmah',
                'deskripsi' => 'Taman pendidikan Al-Qur\'an untuk anak usia dini belajar dasar Islam.',
                'lokasi' => 'Perumahan Griya Indo Kencana',
                'detail' => [
                    'ikon' => 'fa-book-open',
                    'warna_label' => 'bg-violet-100 text-violet-800',
                    'kontak' => '0819-5678-9012',
                    'jam_operasional' => '16:00 - 18:00'
                ],
                'urutan' => 1,
            ],
        ];

        foreach ($fasilitasData as $index => $fasilitas) {
            JelajahLekop::create([
                'tipe' => 'fasilitas',
                'kategori' => $fasilitas['kategori'],
                'nama' => $fasilitas['nama'],
                'deskripsi' => $fasilitas['deskripsi'],
                'lokasi' => $fasilitas['lokasi'],
                'gambar' => 'fasilitas-' . ($index + 1) . '.jpg',
                'detail' => $fasilitas['detail'],
                'status' => 'aktif',
                'urutan' => $fasilitas['urutan'],
            ]);
        }

        // UMKM Data
        $umkmData = [
            [
                'nama' => 'Kerupuk Pak Haji',
                'deskripsi' => 'Kerupuk khas Bintan dengan resep turun temurun, kualitas premium dan rasa autentik',
                'lokasi' => 'Jl. Korindo Km 20',
                'detail' => [
                    'ikon' => 'fa-store',
                    'badge' => '<i class="fas fa-fire mr-1"></i>Best Seller',
                    'badge_color' => 'bg-red-500',
                    'produk' => ['Kerupuk Ikan Tenggiri', 'Kerupuk Atom', 'Kerupuk Udang'],
                    'harga' => 'Rp 25.000 - 60.000',
                    'pemilik' => 'Bapak Haji Ahmad',
                    'telepon' => '0812-3456-7890',
                    'tahun_berdiri' => '1985',
                    'keunikan' => 'Resep turun temurun sejak 1985, menggunakan ikan segar pilihan tanpa pengawet, tekstur renyah tahan lama'
                ],
                'urutan' => 1,
            ],
            [
                'nama' => 'Ibu Sumi\'s Snack',
                'deskripsi' => 'Makanan ringan homemade dengan bahan pilihan, tanpa pengawet dan pewarna buatan',
                'lokasi' => 'Perumahan Griya Indo Kencana',
                'detail' => [
                    'ikon' => 'fa-cookie-bite',
                    'badge' => '<i class="fas fa-leaf mr-1"></i>Organik',
                    'badge_color' => 'bg-green-500',
                    'produk' => ['Kue Kering', 'Pisang Goreng', 'Donat Kampung', 'Roti Bakar'],
                    'harga' => 'Rp 15.000 - 45.000',
                    'pemilik' => 'Ibu Sumiati',
                    'telepon' => '0813-6789-0123',
                    'tahun_berdiri' => '1992',
                    'keunikan' => '100% bahan organik lokal, tanpa pewarna buatan, kemasan eco-friendly, resep keluarga sejak 1992'
                ],
                'urutan' => 2,
            ],
            [
                'nama' => 'Toko Rajawali',
                'deskripsi' => 'Toko kelontong lengkap dengan harga bersaing, melayani antar jemput untuk warga sekitar',
                'lokasi' => 'Jl. Poros Km 22',
                'detail' => [
                    'ikon' => 'fa-shopping-basket',
                    'badge' => '<i class="fas fa-star mr-1"></i>Terpercaya',
                    'badge_color' => 'bg-blue-500',
                    'produk' => ['Sembako', 'Minuman', 'Pulsa & Token', 'Perlengkapan Rumah'],
                    'harga' => 'Harga Bersaing',
                    'pemilik' => 'Bapak Budi Santoso',
                    'telepon' => '0821-2345-6789',
                    'tahun_berdiri' => '2005',
                    'keunikan' => 'Layanan antar jemput gratis untuk radius 5km, stok selalu lengkap, harga grosir untuk reseller'
                ],
                'urutan' => 3,
            ],
            [
                'nama' => 'Salon Ibu Rina',
                'deskripsi' => 'Salon kecantikan dengan harga terjangkau, pelayanan ramah dan hasil memuaskan',
                'lokasi' => 'Kawasan Perumahan',
                'detail' => [
                    'ikon' => 'fa-cut',
                    'badge' => '<i class="fas fa-star mr-1"></i>Recommended',
                    'badge_color' => 'bg-purple-500',
                    'produk' => ['Potong Rambut', 'Creambath', 'Makeup', 'Hair Treatment'],
                    'harga' => 'Rp 25.000 - 150.000',
                    'pemilik' => 'Ibu Rina Sari',
                    'telepon' => '0819-8765-4321',
                    'tahun_berdiri' => '2010',
                    'keunikan' => 'Produk kosmetik herbal lokal, teknik potong modern, pelayanan VIP untuk pelanggan setia'
                ],
                'urutan' => 4,
            ],
            [
                'nama' => 'Bengkel Jaya Makmur',
                'deskripsi' => 'Bengkel motor terpercaya, melayani service panggilan untuk wilayah Sungai Lekop',
                'lokasi' => 'Jl. Korindo Km 18',
                'detail' => [
                    'ikon' => 'fa-motorcycle',
                    'badge' => '<i class="fas fa-wrench mr-1"></i>Jasa',
                    'badge_color' => 'bg-purple-500',
                    'produk' => ['Service Motor', 'Ganti Oli', 'Tambal Ban', 'Sparepart'],
                    'harga' => 'Rp 20.000 - 200.000',
                    'pemilik' => 'Bapak Joko Prasetyo',
                    'telepon' => '0815-4321-9876',
                    'tahun_berdiri' => '2008',
                    'keunikan' => 'Suku cadang original, garansi service 3 bulan, teknisi bersertifikat, siaga 24 jam'
                ],
                'urutan' => 5,
            ],
            [
                'nama' => 'Warung Bu Narti',
                'deskripsi' => 'Warung makan dengan menu rumahan yang lezat, harga terjangkau dan porsi besar',
                'lokasi' => 'Jl. Poros Km 21',
                'detail' => [
                    'ikon' => 'fa-bowl-food',
                    'badge' => '<i class="fas fa-utensils mr-1"></i>Enak',
                    'badge_color' => 'bg-red-500',
                    'produk' => ['Nasi Padang', 'Ayam Bakar', 'Soto', 'Gulai'],
                    'harga' => 'Rp 15.000 - 35.000',
                    'pemilik' => 'Ibu Narti Wijaya',
                    'telepon' => '0817-6543-2109',
                    'tahun_berdiri' => '2015',
                    'keunikan' => 'Bumbu rahasia keluarga, rempah pilihan dari petani lokal, porsi jumbo harga kaki lima'
                ],
                'urutan' => 6,
            ],
        ];

        foreach ($umkmData as $index => $umkm) {
            JelajahLekop::create([
                'tipe' => 'umkm',
                'nama' => $umkm['nama'],
                'deskripsi' => $umkm['deskripsi'],
                'lokasi' => $umkm['lokasi'],
                'gambar' => 'umkm-' . ($index + 1) . '.jpg',
                'galeri' => ['umkm-' . ($index + 1) . '-1.jpg', 'umkm-' . ($index + 1) . '-2.jpg', 'umkm-' . ($index + 1) . '-3.jpg'],
                'detail' => $umkm['detail'],
                'status' => 'aktif',
                'urutan' => $umkm['urutan'],
            ]);
        }

        // Galeri Kegiatan Data
        $galeriData = [
            [
                'nama' => 'Rapat Desa',
                'deskripsi' => 'Rapat koordinasi pembangunan desa bersama warga',
                'kategori' => 'pemerintahan',
                'detail' => [
                    'kategori_galeri' => 'pemerintahan',
                    'tanggal' => '2024-01-15',
                    'deskripsi_singkat' => 'Rapat rutin bulanan untuk membahas program pembangunan'
                ],
                'urutan' => 1,
            ],
            [
                'nama' => 'Musrenbang',
                'deskripsi' => 'Musyawarah perencanaan pembangunan tahun 2024',
                'kategori' => 'pemerintahan',
                'detail' => [
                    'kategori_galeri' => 'pemerintahan',
                    'tanggal' => '2024-02-20',
                    'deskripsi_singkat' => 'Musrenbang untuk menentukan prioritas pembangunan'
                ],
                'urutan' => 2,
            ],
            [
                'nama' => 'Gotong Royong',
                'deskripsi' => 'Kegiatan gotong royong membersihkan lingkungan',
                'kategori' => 'kemasyarakatan',
                'detail' => [
                    'kategori_galeri' => 'kemasyarakatan',
                    'tanggal' => '2024-03-10',
                    'deskripsi_singkat' => 'Gotong royong bersama warga untuk kebersihan'
                ],
                'urutan' => 1,
            ],
            [
                'nama' => 'Pengajian Rutin',
                'deskripsi' => 'Pengajian rutin mingguan di Masjid Al-Kautsar',
                'kategori' => 'kemasyarakatan',
                'detail' => [
                    'kategori_galeri' => 'kemasyarakatan',
                    'tanggal' => '2024-03-15',
                    'deskripsi_singkat' => 'Pengajian rutin untuk meningkatkan keimanan'
                ],
                'urutan' => 2,
            ],
            [
                'nama' => 'Pembangunan Jalan',
                'deskripsi' => 'Pembangunan jalan desa untuk akses yang lebih baik',
                'kategori' => 'pembangunan',
                'detail' => [
                    'kategori_galeri' => 'pembangunan',
                    'tanggal' => '2024-04-05',
                    'deskripsi_singkat' => 'Peningkatan infrastruktur jalan desa'
                ],
                'urutan' => 1,
            ],
            [
                'nama' => 'Produksi Kerupuk',
                'deskripsi' => 'Proses produksi kerupuk ikan tradisional',
                'kategori' => 'umkm',
                'detail' => [
                    'kategori_galeri' => 'umkm',
                    'tanggal' => '2024-04-10',
                    'deskripsi_singkat' => 'Dokumentasi proses produksi UMKM lokal'
                ],
                'urutan' => 1,
            ],
        ];

        foreach ($galeriData as $index => $galeri) {
            JelajahLekop::create([
                'tipe' => 'galeri_kegiatan',
                'nama' => $galeri['nama'],
                'deskripsi' => $galeri['deskripsi'],
                'kategori' => $galeri['kategori'],
                'gambar' => 'galeri-' . ($index + 1) . '.jpg',
                'detail' => $galeri['detail'],
                'status' => 'aktif',
                'urutan' => $galeri['urutan'],
            ]);
        }
    }
}
