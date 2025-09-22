<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PelatihansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('pelatihans')->delete();
        
        DB::table('pelatihans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_pelatihan' => 'Soft Skill\'s Training',
                'gambar' => 'pelatihans/HKZrIXx6dEURNOp1cqF9Ah4Uy8fBhK1BVl3yux4c.jpg',
                'deskripsi' => '<p>Pelatihan untuk meningkatkan keterampilan interpersonal, komunikasi, leadership, dan kerjasama tim yang sangat dibutuhkan di dunia kerja modern.</p>',
                'tanggal_mulai' => '2025-08-20',
                'tanggal_selesai' => '2025-08-29',
                'lokasi' => 'Tiban Housing B4 No 10 Batam',
                'created_at' => '2025-08-21 13:09:01',
                'updated_at' => '2025-08-24 05:51:27',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_pelatihan' => 'Pelatihan Manajemen SDM Sertifikasi BNS',
                'gambar' => 'pelatihans/3fazRMEsDRCJGVQA3Wycf7yialbr4qknPvVcW5fv.jpg',
                'deskripsi' => '<p>Mengembangkan kompetensi profesional dalam mengelola sumber daya manusia dengan sertifikasi yang sesuai standar nasional.</p>',
                'tanggal_mulai' => '2025-08-24',
                'tanggal_selesai' => '2025-08-27',
                'lokasi' => 'Ballroom Hotel Kencana',
                'created_at' => '2025-08-21 13:12:06',
                'updated_at' => '2025-08-24 05:50:35',
            ),
            2 => 
            array (
                'id' => 15,
                'nama_pelatihan' => 'In House Training',
                'gambar' => 'pelatihans/HF8rZCvTVsMFj4SdBSwJB9DdP5kS66ftePwaYNwO.jpg',
                'deskripsi' => '<p>Pelatihan yang dirancang khusus untuk kebutuhan internal organisasi atau institusi, dilakukan secara fleksibel di tempat peserta.</p>',
                'tanggal_mulai' => '2025-08-26',
                'tanggal_selesai' => '2025-09-06',
                'lokasi' => 'Via Zoom',
                'created_at' => '2025-08-26 11:31:18',
                'updated_at' => '2025-08-26 11:31:18',
            ),
        ));
        
        
    }
}