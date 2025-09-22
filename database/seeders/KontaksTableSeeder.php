<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KontaksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('kontaks')->delete();
        
        DB::table('kontaks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Nova',
                'email' => 'nova11@gmail.com',
                'subject' => NULL,
                'message' => 'Loremm',
                'phone' => NULL,
                'status' => 'new',
                'responded_at' => NULL,
                'created_at' => '2025-07-28 07:25:27',
                'updated_at' => '2025-07-28 07:25:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'El',
                'email' => 'elovaan33@gmail.com',
                'subject' => 'Penting',
                'message' => 'Aku pingin',
                'phone' => NULL,
                'status' => 'new',
                'responded_at' => NULL,
                'created_at' => '2025-07-29 07:26:02',
                'updated_at' => '2025-07-29 07:26:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'aaaa',
                'email' => 'aaaaa@gmail.com',
                'subject' => 'S',
                'message' => 'A',
                'phone' => NULL,
                'status' => 'new',
                'responded_at' => NULL,
                'created_at' => '2025-07-29 08:12:00',
                'updated_at' => '2025-07-29 08:12:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ajjks',
                'email' => 'hasghja@gmail.com',
                'subject' => 'ass',
                'message' => 'jsbdjks',
                'phone' => NULL,
                'status' => 'new',
                'responded_at' => NULL,
                'created_at' => '2025-07-29 08:12:56',
                'updated_at' => '2025-07-29 08:12:56',
            ),
        ));
        
        
    }
}