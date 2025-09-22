<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'novaa',
                'email' => 'novaa@gmail.com',
                'email_verified_at' => '2025-07-28 09:32:21',
                'password' => '$2a$12$QW1TKfe2hHFLy39VZRsYF.fv4nPzMDJDuTP5f.iSgdiT6tseNdqsG',
                'role' => 'user',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-08-23 13:09:32',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Klienn',
                'email' => 'lovingnjun00@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$51moeGacl6Aa9EIbO0UJIuIWl75/GJvJcHEFGOdFjRmYB60f7PKkK',
                'role' => 'user',
                'remember_token' => NULL,
                'created_at' => '2025-08-23 13:47:58',
                'updated_at' => '2025-08-26 15:12:13',
            ),
        ));
        
        
    }
}