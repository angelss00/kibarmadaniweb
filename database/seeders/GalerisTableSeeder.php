<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GalerisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('galeris')->delete();
        
        DB::table('galeris')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Pertemuan 2',
                'slug' => 'pertemuan-2',
                'description' => '<p>Memperkenalkan Kibar Madanii</p>',
                'image_path' => '/storage/galeri/uVfjG2QgmgFFHJH3OJQ2PR2kSeArNW2Z8TJ5kPEt.jpg',
                'category_id' => 2,
                'album_id' => 2,
                'uploader' => 'Angel',
                'status' => 'published',
                'taken_at' => '2025-07-17',
                'is_featured' => 0,
                'created_at' => '2025-07-28 02:23:07',
                'updated_at' => '2025-08-26 08:53:40',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Pertemuan 1',
                'slug' => 'pertemuan-1',
                'description' => '<p>Berdiskusi dengan anggota LPK KIBAR MADANII</p>',
                'image_path' => '/storage/galeri/SNL3j08yLyTpJVMEApreHokOEfrMlD7VELX8ZUly.jpg',
                'category_id' => 2,
                'album_id' => 3,
                'uploader' => 'Angel',
                'status' => 'published',
                'taken_at' => '2025-07-29',
                'is_featured' => 0,
                'created_at' => '2025-07-29 04:51:36',
                'updated_at' => '2025-08-25 02:11:00',
            ),
            2 => 
            array (
                'id' => 5,
                'title' => 'Pertemuan 3',
                'slug' => 'pertemuan-3',
                'description' => '<p>Berdiskusi dengan anggota LPK KIBAR MADANI</p>',
                'image_path' => '/storage/galeri/ZYc9ONzSRqPAK2yw8f58SD2ZxrI1RKOFCFPjVjpt.jpg',
                'category_id' => 2,
                'album_id' => 4,
                'uploader' => 'Angel',
                'status' => 'published',
                'taken_at' => '2025-07-27',
                'is_featured' => 0,
                'created_at' => '2025-08-04 07:30:23',
                'updated_at' => '2025-08-25 02:08:43',
            ),
            3 => 
            array (
                'id' => 8,
                'title' => 'Pertemuan 4',
                'slug' => 'pertemuan-4',
                'description' => '<p>Soft skill\'s training</p>',
                'image_path' => '/storage/galeri/nWLBpIdygLpvnsXZal8H7npMwPr9jtlcux4mn8sU.jpg',
                'category_id' => 1,
                'album_id' => 3,
                'uploader' => 'Angel',
                'status' => 'published',
                'taken_at' => '2025-08-25',
                'is_featured' => 0,
                'created_at' => '2025-08-25 02:10:14',
                'updated_at' => '2025-08-25 02:10:14',
            ),
        ));
        
        
    }
}