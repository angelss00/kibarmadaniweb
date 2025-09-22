<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GalerryCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('galerry_categories')->delete();
        
        DB::table('galerry_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Soft Skill\'s',
                'slug' => 'soft-skills',
                'description' => '<p>Sesusai skills yang diminati</p>',
                'created_at' => '2025-07-28 09:21:37',
                'updated_at' => '2025-08-24 03:12:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Berdiskusi',
                'slug' => 'berdiskusi',
                'description' => 'Menyampaikan pendapat',
                'created_at' => '2025-08-04 10:11:29',
                'updated_at' => '2025-08-09 02:03:09',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Klien',
                'slug' => 'klien',
                'description' => 'kerjasama',
                'created_at' => '2025-08-09 01:43:57',
                'updated_at' => '2025-08-09 02:02:54',
            ),
        ));
        
        
    }
}