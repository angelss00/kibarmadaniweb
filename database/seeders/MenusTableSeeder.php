<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('menus')->delete();
        
        DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'slug' => 'home',
                'urutan' => 1,
                'nama' => 'Home',
                'url' => 'hero',
                'type' => 'scroll',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 03:54:51',
                'updated_at' => '2025-09-22 03:54:51',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'slug' => 'tentang-kami',
                'urutan' => 2,
                'nama' => 'Tentang Kami',
                'url' => '/tentang-kami',
                'type' => 'url',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 03:57:56',
                'updated_at' => '2025-09-22 03:57:56',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'slug' => 'jadwal-pelatihan',
                'urutan' => 3,
                'nama' => 'Jadwal Pelatihan',
                'url' => 'pelatihans',
                'type' => 'scroll',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 03:59:01',
                'updated_at' => '2025-09-22 03:59:01',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'slug' => 'berita',
                'urutan' => 4,
                'nama' => 'Berita',
                'url' => 'berita',
                'type' => 'scroll',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 03:59:37',
                'updated_at' => '2025-09-22 03:59:37',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'slug' => 'testimoni',
                'urutan' => 5,
                'nama' => 'Testimoni',
                'url' => 'testimonials',
                'type' => 'scroll',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:00:08',
                'updated_at' => '2025-09-22 04:00:08',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'slug' => 'galeri',
                'urutan' => 6,
                'nama' => 'Galeri',
                'url' => '/galeri',
                'type' => 'url',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:02:43',
                'updated_at' => '2025-09-22 04:02:43',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => NULL,
                'slug' => 'kontak-kami',
                'urutan' => 7,
                'nama' => 'Kontak Kami',
                'url' => 'contact',
                'type' => 'scroll',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:04:09',
                'updated_at' => '2025-09-22 04:04:50',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => NULL,
                'slug' => 'pendaftaran',
                'urutan' => 8,
                'nama' => 'Pendaftaran',
                'url' => '/pendaftarans/create',
                'type' => 'url',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:05:41',
                'updated_at' => '2025-09-22 04:05:41',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => NULL,
                'slug' => 'arsip',
                'urutan' => 9,
                'nama' => 'Arsip',
                'url' => '/filedownload',
                'type' => 'url',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:06:42',
                'updated_at' => '2025-09-22 04:06:42',
            ),
            9 => 
            array (
                'id' => 10,
                'parent_id' => 2,
                'slug' => 'visi-misi-dan-makna',
                'urutan' => 1,
                'nama' => 'Visi, Misi, dan Makna',
                'url' => '/visi-misi',
                'type' => 'url',
                'deskripsi' => NULL,
                'created_at' => '2025-09-22 04:08:00',
                'updated_at' => '2025-09-22 04:08:00',
            ),
        ));
        
        
    }
}