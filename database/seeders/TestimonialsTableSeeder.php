<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('testimonials')->delete();
        
        DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'nova',
                'photo' => NULL,
                'testimony' => 'lpk sangat bagus',
                'created_at' => '2025-08-25 04:26:36',
                'updated_at' => '2025-08-25 04:26:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Marry',
                'photo' => NULL,
                'testimony' => 'Pelatihan yang sangat bermanfaat',
                'created_at' => '2025-08-25 06:06:21',
                'updated_at' => '2025-08-25 06:06:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Antony',
                'photo' => NULL,
                'testimony' => 'Pengalaman yg luar biasa',
                'created_at' => '2025-08-25 06:06:51',
                'updated_at' => '2025-08-25 06:06:51',
            ),
        ));
        
        
    }
}