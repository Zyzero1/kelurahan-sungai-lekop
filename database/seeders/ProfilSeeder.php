<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profil = Profil::orderBy('id', 'desc')->first();
        if (!$profil) {
            $profil = new Profil();
        }

        $profil->fill([
            // Informasi Umum
            'nama_kelurahan' => 'Sungai Lekop',
            'alamat' => 'Jl. Laksamana R.E. Martadinata No. 123, Sungai Lekop, Tanjungpinang',
            'kode_pos' => '29151',
            'luas_wilayah' => '12.5',
            'jumlah_rw' => '5',
            'jumlah_rt' => '15',

            // Demografi Penduduk
            'jumlah_laki_laki' => '2500',
            'jumlah_perempuan' => '2300',
            'jumlah_kk' => '1200',
            'demografi_deskripsi' => 'Kelurahan Sungai Lekop memiliki komposisi penduduk yang seimbang antara laki-laki dan perempuan dengan mayoritas penduduk bekerja di sektor jasa dan perdagangan.',

            // Pimpinan & Identitas
            'nama_lurah' => 'Budi Santoso, S.Sos',
            'nip_lurah' => '19750415 200001 1 001',
            'email' => 'sungailekop@tanjungpinang.go.id',
            'telepon' => '(0771) 123456',
            'motto_lurah' => 'Melayani dengan sepenuh hati, membangun untuk kemajuan bersama.',

            // Visi & Misi
            'visi' => 'Terwujudnya Kelurahan Sungai Lekop yang sejahtera, mandiri, dan berdaya saing berlandaskan gotong royong.',
            'misi' => '1. Meningkatkan pelayanan publik yang prima dan transparan\n2. Mengembangkan potensi ekonomi lokal\n3. Memperkuat tali persaudaraan dan gotong royong\n4. Meningkatkan kualitas sumber daya manusia\n5. Melestarikan nilai-nilai budaya lokal',

            // Sejarah
            'sejarah' => 'Kelurahan Sungai Lekop merupakan salah satu kelurahan tertua di Kota Tanjungpinang. Nama "Sungai Lekop" diambil dari nama sungai yang melintasi wilayah ini yang dahulu banyak ditumbuhi oleh pohon lekop (sejenis pohon mangrove). Pada awalnya, wilayah ini adalah pemukiman nelayan tradisional yang secara bertahap berkembang menjadi kawasan permukiman yang padat. Seiring dengan perkembangan waktu, Kelurahan Sungai Lekop menjadi pusat perdagangan dan jasa yang penting di wilayah Kepulauan Riau.',
        ]);

        $profil->save();
    }
}
