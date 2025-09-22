<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FileDownloadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('file_downloads')->delete();
        
        DB::table('file_downloads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Pertemuan 2',
                'slug' => 'pertemuan-2',
                'description' => 'hi',
                'file_path' => 'downloads/7pPMcdL7JCjkyToKUCWQRzi5ebiNf2hfMwcA4JVi.png',
                'category_id' => NULL,
                'file_type' => 'png',
                'file_size' => 90871,
                'uploader' => 'Angel',
                'status' => 'draft',
                'download_count' => 0,
                'created_at' => '2025-07-28 07:37:34',
                'updated_at' => '2025-07-28 07:37:34',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Pertemuan 3',
                'slug' => 'pertemuan-3',
                'description' => 'hi',
                'file_path' => 'downloads/YP79ryvMN1qXw1sMv1kyttgKbm1vWqeSK70LKaH6.png',
                'category_id' => NULL,
                'file_type' => 'png',
                'file_size' => 90871,
                'uploader' => 'Angel',
                'status' => 'draft',
                'download_count' => 0,
                'created_at' => '2025-07-28 07:38:27',
                'updated_at' => '2025-07-28 07:38:27',
            ),
            2 => 
            array (
                'id' => 4,
            'title' => 'Pelatihan Berbasis Kompetensi (PBK) Skema “Master Trainer”',
                'slug' => 'pelatihan-berbasis-kompetensi-pbk-skema-master-trainer',
                'description' => 'gggini',
                'file_path' => 'downloads/8ZoI5u8IL3jnTdngCKSyh4RSMHmhZ4B83Vk4aIb4.jpg',
                'category_id' => NULL,
                'file_type' => 'jpg',
                'file_size' => 73615,
                'uploader' => 'Angel',
                'status' => 'published',
                'download_count' => 0,
                'created_at' => '2025-08-26 12:01:52',
                'updated_at' => '2025-08-26 12:01:52',
            ),
        ));
        
        
    }
}