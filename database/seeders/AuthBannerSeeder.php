<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AuthBanner;

class AuthBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        AuthBanner::firstOrCreate([], [
            'image_path' => null,
            'quote'      => 'Pendekatan pembelajaran mudah diterapkan dan langsung bisa diimplementasikan dalam kehidupan nyata.',
            'author'     => 'LPK KIBAR MADANI',
        ]);
    }
}
