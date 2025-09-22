<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PendaftaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('pendaftarans')->delete();
        
        DB::table('pendaftarans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Angel Nova',
                'email' => 'angelnova0311@gmail.com',
                'telepon' => '85715151',
                'alamat' => 'Poncowarno',
                'pelatihan_id' => 1,
                'catatan' => 'Tidak Ada',
                'created_at' => '2025-08-21 14:35:46',
                'updated_at' => '2025-08-21 14:35:46',
            ),
        ));
        
        
    }
}