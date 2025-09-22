<?php

namespace Database\Seeders;

use App\Models\AuthBanner;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        ]);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(BeritasTableSeeder::class);
        $this->call(FileDownloadsTableSeeder::class);
        $this->call(GalerisTableSeeder::class);
        $this->call(GalerryCategoriesTableSeeder::class);
        $this->call(InfosTableSeeder::class);
        $this->call(KategorisTableSeeder::class);
        $this->call(KontaksTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PelatihansTableSeeder::class);
        $this->call(PendaftaransTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(LoginBannersTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
