<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('sections')->delete();
        
        DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 3,
                'type' => 'layanan',
                'title' => 'TFT Sertifikasi BNSP',
                'description' => '<p>Pelatihan menjadi trainer bersertifikat nasional yang diakui oleh BNSP. Menyediakan pemahaman mendalam tentang metodologi pelatihan dan sertifikasi profesi.</p>',
                'order' => 1,
                'created_at' => '2025-08-24 12:48:32',
                'updated_at' => '2025-08-24 13:06:12',
            ),
            1 => 
            array (
                'id' => 4,
                'type' => 'layanan',
                'title' => 'Pelatihan Manajemen SDM Sertifikasi BNS',
                'description' => '<p>Mengembangkan kompetensi profesional dalam mengelola sumber daya manusia dengan sertifikasi yang sesuai standar nasional.</p>',
                'order' => 2,
                'created_at' => '2025-08-24 13:07:05',
                'updated_at' => '2025-08-24 13:07:05',
            ),
            2 => 
            array (
                'id' => 5,
                'type' => 'layanan',
                'title' => 'Sertifikasi Neo NLP',
            'description' => '<p>Program sertifikasi NLP (Neuro Linguistic Programming) yang membekali peserta dengan keterampilan komunikasi, motivasi, dan pengembangan diri.</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:13:32',
                'updated_at' => '2025-08-24 15:13:32',
            ),
            3 => 
            array (
                'id' => 7,
                'type' => 'layanan',
                'title' => 'In House Training',
                'description' => '<p>Pelatihan yang dirancang khusus untuk kebutuhan internal organisasi atau institusi, dilakukan secara fleksibel di tempat peserta.</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:14:24',
                'updated_at' => '2025-08-24 15:14:24',
            ),
            4 => 
            array (
                'id' => 8,
                'type' => 'layanan',
                'title' => 'Pelatihan untuk Sekolah/Lembaga Pendidikan',
                'description' => '<p>Program khusus untuk guru, kepala sekolah, dan tenaga kependidikan dalam meningkatkan kualitas pembelajaran, manajemen sekolah, dan spiritual leadership.</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:14:57',
                'updated_at' => '2025-08-24 15:14:57',
            ),
            5 => 
            array (
                'id' => 9,
                'type' => 'keunggulan',
                'title' => 'Fun Learning',
                'description' => '<p>Lingkungan belajar yang menyenangkan dan mendorong kolaborasi serta partisipasi aktif</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:21:36',
                'updated_at' => '2025-08-24 15:21:36',
            ),
            6 => 
            array (
                'id' => 10,
                'type' => 'keunggulan',
                'title' => 'Meaningful Program',
                'description' => '<p>Program dirancang secara teliti untuk dampak karier dan pengembangan pribadi yang bermakna.</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:22:01',
                'updated_at' => '2025-08-24 15:22:01',
            ),
            7 => 
            array (
                'id' => 11,
                'type' => 'keunggulan',
                'title' => 'Powerful',
                'description' => '<p>Dukungan kurikulum kuat &amp; komprehensif untuk hasil pembelajaran yang relevan dan mendalam.</p>',
                'order' => 0,
                'created_at' => '2025-08-24 15:22:21',
                'updated_at' => '2025-08-24 15:22:21',
            ),
            8 => 
            array (
                'id' => 14,
                'type' => 'layanan',
                'title' => 'Soft Skill\'s Training',
                'description' => '<p>Pelatihan untuk meningkatkan keterampilan interpersonal, komunikasi, leadership, dan kerjasama tim yang sangat dibutuhkan di dunia kerja modern.</p>',
                'order' => 0,
                'created_at' => '2025-08-25 03:31:22',
                'updated_at' => '2025-08-25 07:31:30',
            ),
            9 => 
            array (
                'id' => 15,
                'type' => 'keunggulan',
                'title' => 'Easily to Apply',
                'description' => '<p>Pendekatan pembelajaran mudah diterapkan dan langsung bisa diimplementasikan dalam kehidupan nyata.</p>',
                'order' => 0,
                'created_at' => '2025-08-25 07:32:30',
                'updated_at' => '2025-08-25 07:32:30',
            ),
            10 => 
            array (
                'id' => 16,
                'type' => 'visi',
                'title' => 'Visi',
            'description' => '<p>To make people civilized (Membentuk masyarakat berbudaya madani)</p>',
                'order' => 0,
                'created_at' => NULL,
                'updated_at' => '2025-08-27 02:55:42',
            ),
            11 => 
            array (
                'id' => 17,
                'type' => 'misi',
                'title' => 'Misi',
                'description' => '<ul><li>Mengembangkan setiap individu memiliki kecerdasan spiritual, kompeten di bidangnya dan memiliki keunggulan soft skill</li><li>Menyiapkan generasi unggul yang memiliki pondasi spiritual yang tangguh dan adaptif terhadap perubahan Core Value</li><li><strong>Kreatif</strong> - Mengembangkan gagasan dan metode dalam memudahkan orang dalam pengembangan soft skill dan kompetensi</li><li><strong>Inovatif </strong>- Memelopori hal-hal baru dalam mengembangkan produk dan jasa pengembangan soft skill dan kompetensi</li><li><strong>Brilian</strong> - Berusaha kekinian dalam menyajikan program berbasis soft skills dan kompetensi</li><li><strong>Aktif </strong>- Dalam merespon perubahan keperluan soft skills dan kompetensi</li><li><strong>Religius</strong> - Meningkatkan kecerdasan spiritual sebagai pondasi dalam mengembangkan soft skills dan kompetensi</li></ul>',
                'order' => 0,
                'created_at' => '2025-08-27 02:59:04',
                'updated_at' => '2025-08-27 02:59:04',
            ),
            12 => 
            array (
                'id' => 18,
                'type' => 'makna',
                'title' => 'Makna Kibar Madani',
                'description' => '<p>Kibar menurut KBBI berarti :</p><ul><li>Bergerak Aktif.&nbsp;</li><li>Menjadi Masyhur.</li></ul><p>Sedangkan Madani menurut KBBI adalah&nbsp;</p><p><i><strong>Menjunjung tinggi nilai, norma dan hukum yang ditopang oleh penguasaan iman, ilmu, dan teknologi yang beradab.&nbsp;</strong></i></p><p><i><strong>Dalam bahasa Arab, madani memiliki arti masyarakat yang beradab.</strong></i></p>',
                'order' => 0,
                'created_at' => '2025-08-27 03:02:05',
                'updated_at' => '2025-08-27 04:12:22',
            ),
        ));
        
        
    }
}