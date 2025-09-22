<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KategorisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('kategoris')->delete();
        
        DB::table('kategoris')->insert(array (
            0 => 
            array (
                'id' => 3,
                'nama' => 'Berdiskusi',
                'deskripsi' => 'Membahas Topik-topik tertentu',
                'created_at' => '2025-08-04 03:10:05',
                'updated_at' => '2025-08-22 02:01:49',
            ),
            1 => 
            array (
                'id' => 4,
                'nama' => 'Pelatihan',
                'deskripsi' => 'Menghadirkan nara sumber yang berkualitas',
                'created_at' => '2025-08-23 13:40:01',
                'updated_at' => '2025-08-23 13:44:50',
            ),
            2 => 
            array (
                'id' => 10,
                'nama' => 'Berita',
                'deskripsi' => 'Kategori untuk berita terkini',
                'created_at' => '2025-09-22 02:28:31',
                'updated_at' => '2025-09-22 02:28:31',
            ),
            3 => 
            array (
                'id' => 11,
                'nama' => 'Artikel',
                'deskripsi' => 'Kategori untuk artikel dan opini',
                'created_at' => '2025-09-22 02:28:31',
                'updated_at' => '2025-09-22 02:28:31',
            ),
            4 => 
            array (
                'id' => 12,
                'nama' => 'Pengumuman',
                'deskripsi' => 'Kategori untuk pengumuman sekolah',
                'created_at' => '2025-09-22 02:28:31',
                'updated_at' => '2025-09-22 02:28:31',
            ),
        ));
        
        
    }
}