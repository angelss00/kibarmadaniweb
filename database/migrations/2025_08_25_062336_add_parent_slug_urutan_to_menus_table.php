<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1) Tambah kolom yang dibutuhkan jika belum ada
        if (!Schema::hasColumn('menus', 'parent_id')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            });
        }
        if (!Schema::hasColumn('menus', 'slug')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('parent_id');
            });
        }
        if (!Schema::hasColumn('menus', 'urutan')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->integer('urutan')->default(0)->after('slug');
            });
        }

        // 2) Bereskan data slug agar unik terlebih dahulu
        DB::transaction(function () {
            // Isi slug null/kosong dengan fallback berbasis id (dijamin unik)
            DB::table('menus')
                ->whereNull('slug')
                ->orWhere('slug', '')
                ->update(['slug' => DB::raw("CONCAT('menu-', id)")]);

            // Rapikan duplikat: sisakan baris pertama, lainnya tambahkan sufiks -id
            $dupes = DB::table('menus')
                ->select('slug')
                ->groupBy('slug')
                ->havingRaw('COUNT(*) > 1')
                ->pluck('slug');

            foreach ($dupes as $slug) {
                $rows = DB::table('menus')
                    ->select('id', 'slug')
                    ->where('slug', $slug)
                    ->orderBy('id')
                    ->get();

                $i = 0;
                foreach ($rows as $row) {
                    if ($i > 0) {
                        DB::table('menus')
                            ->where('id', $row->id)
                            ->update(['slug' => $row->slug . '-' . $row->id]); // unik
                    }
                    $i++;
                }
            }
        });

        // 3) Baru tambahkan UNIQUE index
        Schema::table('menus', function (Blueprint $table) {
            // nama index diset eksplisit biar konsisten
            $table->unique('slug', 'menus_slug_unique');
        });
    }

    public function down(): void
    {
        // 1) Hapus unique index terlebih dahulu (kalau ada)
        Schema::table('menus', function (Blueprint $table) {
            try {
                $table->dropUnique('menus_slug_unique');
            } catch (\Throwable $e) {
                // abaikan jika index sudah tidak ada
            }
        });

        // 2) Baru drop kolom
        Schema::table('menus', function (Blueprint $table) {
            if (Schema::hasColumn('menus', 'urutan')) {
                $table->dropColumn('urutan');
            }
            if (Schema::hasColumn('menus', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('menus', 'parent_id')) {
                $table->dropColumn('parent_id');
            }
        });
    }
};
