<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('infos')->delete();
        
        DB::table('infos')->insert(array (
            0 => 
            array (
                'id' => 3,
                'kategori_id' => 3,
                'slider_name' => NULL,
                'judul' => 'Welcome to Kibar Madani',
                'subtitle' => NULL,
            'isi' => '<p>LPK Kibar Madani menjadi narasumber dalam kegiatan Pelatihan Berbasis Kompetensi (PBK) pada skema “Training Need Analysis” untuk 25 SDM Sekolah Tinggi Ilmu Pelayaran Seluruh Indonesia, di bawah pembinaan direktorat perhubungan laut Kementerian Perhubungaan RI. Kegiatan diselenggarakan di Hotel Grand Mercure Yogyakarta</p>',
                'gambar' => 'vAVsMALdu1dMZoHzympxLercfaqINmJQhtiNBNrp.jpg',
                'button_text' => NULL,
                'link_url' => NULL,
                'sort_order' => 0,
                'is_active' => 1,
                'start_at' => NULL,
                'end_at' => NULL,
                'created_at' => '2025-08-24 14:21:34',
                'updated_at' => '2025-08-26 08:05:44',
            ),
            1 => 
            array (
                'id' => 4,
                'kategori_id' => 3,
                'slider_name' => NULL,
            'judul' => 'Pelatihan Berbasis Kompetensi (PBK) Skema “Master Trainer”',
                'subtitle' => NULL,
                'isi' => '<p>LPK Kibar Madani memberikan Pelatihan Berbasis Kompetensi pada skema “Master Trainer” di Universitas Negeri Yogyakarta. Peserta terdiri dari Guru Besar dan dosen senior di lingkungan UNY. Uji kompetensi bekerjasama dengan LSP Trainer Kompeten Indonesia.</p>',
                'gambar' => '3K90Y0x2p401E8wm81ES8WrklAZdI6Ezk4c2p2N4.jpg',
                'button_text' => NULL,
                'link_url' => NULL,
                'sort_order' => 0,
                'is_active' => 1,
                'start_at' => NULL,
                'end_at' => NULL,
                'created_at' => '2025-08-26 08:00:12',
                'updated_at' => '2025-08-26 08:21:31',
            ),
            2 => 
            array (
                'id' => 5,
                'kategori_id' => 3,
                'slider_name' => NULL,
                'judul' => 'Training Need Analysis',
                'subtitle' => NULL,
            'isi' => '<p>LPK Kibar Madani menjadi narasumber dalam kegiatan Pelatihan Berbasis Kompetensi (PBK) pada skema “Training Need Analysis” untuk 25 SDM Sekolah Tinggi Ilmu Pelayaran Seluruh Indonesia, di bawah pembinaan direktorat perhubungan laut Kementerian Perhubungaan RI. Kegiatan diselenggarakan di Hotel Grand Mercure Yogyakarta</p>',
                'gambar' => 'sliders/e6ppyTZdmIcmNudmmSbOPq5mBUNFVdnduO2id2dW.jpg',
                'button_text' => NULL,
                'link_url' => NULL,
                'sort_order' => 0,
                'is_active' => 1,
                'start_at' => NULL,
                'end_at' => NULL,
                'created_at' => '2025-08-26 08:08:12',
                'updated_at' => '2025-08-26 08:08:12',
            ),
        ));
        
        
    }
}