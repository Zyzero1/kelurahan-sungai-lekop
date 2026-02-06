<?php

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run()
    {
        Kontak::create([
            'alamat' => 'Jl. Sungai Lekop No. 123, Kelurahan Sungai Lekop, Kecamatan Bintan Timur, Kabupaten Bintan, Kepulauan Riau 29153',
            'telepon' => '(0771) 123456',
            'email' => 'kelurahan.sungailekop@bintankab.go.id',
            'jam_operasional' => 'Senin - Kamis: 08.00 - 16.00
Jumat: 08.00 - 15.30
Sabtu - Minggu: Tutup',
            'instagram' => 'https://www.instagram.com/kelurahan.sungailekop/',
            'facebook' => 'https://www.facebook.com/kelurahan.sungailekop',
            'twitter' => 'https://twitter.com/kelurahanlekop',
            'youtube' => 'https://www.youtube.com/@kelurahanlekop',
            'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.123456789!2d104.123456789!3d1.123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwMDcnNDQuMSJTIDEwNMKwMDcnMjQuNCJF!5e0!3m2!1sen!2sid!4v1234567890" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);
    }
}
