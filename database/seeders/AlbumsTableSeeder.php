<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AlbumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('albums')->delete();
        
        DB::table('albums')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Kegiatan LPK KIBAR MADANI',
                'slug' => 'kmu',
                'description' => 'Semua hal yg berkaitan dengan Kibar Madani',
                'created_at' => '2025-08-04 10:23:08',
                'updated_at' => '2025-08-04 10:23:09',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Kegiatan Rutin Bulanan',
                'slug' => 'kegiatan-rutin-bulanan',
                'description' => 'LPK Kibar Madani',
                'created_at' => '2025-08-04 13:30:16',
                'updated_at' => '2025-08-09 01:20:51',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'Pertemuan Rutin Klien',
                'slug' => 'pertemuan-rutin-klien',
                'description' => '<p>Menjalin kerja sama dengan baik dengan para klienn</p>',
                'created_at' => '2025-08-09 01:28:42',
                'updated_at' => '2025-08-24 03:29:47',
            ),
        ));
        
        
    }
}