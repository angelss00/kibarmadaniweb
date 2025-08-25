<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddParentSlugUrutanToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tambahkan kolom parent_id jika belum ada
        if (!Schema::hasColumn('menus', 'parent_id')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            });
        }

        // Tambahkan kolom slug jika belum ada
        if (!Schema::hasColumn('menus', 'slug')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('parent_id');
            });
        }

        // Tambahkan kolom urutan jika belum ada
        if (!Schema::hasColumn('menus', 'urutan')) {
            Schema::table('menus', function (Blueprint $table) {
                $table->integer('urutan')->default(0)->after('slug');
            });
        }

        // Update slug yang kosong menjadi nilai default
        DB::table('menus')->whereNull('slug')->orWhere('slug', '')->update(['slug' => 'default-slug']);

        // Menambahkan constraint unique setelah memperbarui data slug
        Schema::table('menus', function (Blueprint $table) {
            $table->unique('slug', 'menus_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus kolom jika rollback migration
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['parent_id', 'slug', 'urutan']);
        });
    }
}
