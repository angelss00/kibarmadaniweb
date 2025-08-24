<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('menus')->truncate(); // kosongin dulu biar nggak dobel

        DB::table('menus')->insert([
            [
                'nama' => 'Home',
                'url' => 'hero', // tanpa #
                'type' => 'scroll',
            ],
            [
                'nama' => 'Berita',
                'url' => 'berita', // tanpa #
                'type' => 'scroll',
            ],
            [
                'nama' => 'Tentang Kami',
                'url' => 'about', // tanpa #
                'type' => 'scroll',
            ],
            [
                'nama' => 'Jadwal Pelatihan',
                'url' => 'pelatihans.jadwal',
                'type' => 'route',
            ],
            [
                'nama' => 'Galeri',
                'url' => 'galeri',
                'type' => 'route',
            ],
            [
                'nama' => 'Pendaftaran',
                'url' => 'pendaftarans.create',
                'type' => 'route',
            ],
            [
                'nama' => 'Kontak Kami',
                'url' => 'contact', // tanpa #
                'type' => 'scroll',
            ],
        ]);
    }
}
