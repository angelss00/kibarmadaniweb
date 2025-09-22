<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LoginBannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('login_banners')->delete();
        
        DB::table('login_banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image_path' => 'login/banners/6qf3z.jpg',
                'quote' => 'Lpk kibar madani mantap',
                'author' => 'Jessica',
                'is_active' => 1,
                'sort_order' => 1,
                'created_at' => NULL,
                'updated_at' => '2025-09-22 02:03:18',
            ),
            1 => 
            array (
                'id' => 2,
                'image_path' => 'login/banners/ETYibx7V71xbA9oACXizZKOn69trxJJqljYNQmhT.jpg',
                'quote' => 'Lpk kibar madani sangat berkualitas',
                'author' => 'Ary',
                'is_active' => 1,
                'sort_order' => 2,
                'created_at' => '2025-09-22 01:58:09',
                'updated_at' => '2025-09-22 02:03:41',
            ),
            2 => 
            array (
                'id' => 3,
                'image_path' => 'login/banners/ejdb8uDwg91C9CS7aFVTUZ04loRNVx0FEC2vnWbm.jpg',
                'quote' => 'Lpk Kibar Madani sangat membantu',
                'author' => 'El',
                'is_active' => 1,
                'sort_order' => 3,
                'created_at' => '2025-09-22 02:06:05',
                'updated_at' => '2025-09-22 02:06:05',
            ),
        ));
        
        
    }
}