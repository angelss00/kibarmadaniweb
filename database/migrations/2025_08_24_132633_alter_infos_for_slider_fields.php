<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('infos', function (Blueprint $t) {
            // penempatan slider (biar bisa punya beberapa area, mis. 'homepage-hero')
            $t->string('slider_name', 100)->nullable()->after('kategori_id');

            // properti slider
            $t->string('subtitle', 255)->nullable()->after('judul');
            $t->string('button_text', 50)->nullable()->after('gambar');
            $t->string('link_url', 255)->nullable()->after('button_text');

            $t->unsignedInteger('sort_order')->default(0)->after('link_url');
            $t->boolean('is_active')->default(true)->after('sort_order');

            $t->timestamp('start_at')->nullable()->after('is_active');
            $t->timestamp('end_at')->nullable()->after('start_at');

            // index untuk query cepat
            $t->index(['slider_name','is_active','sort_order'], 'idx_infos_slider_active_order');
            $t->index(['start_at','end_at'], 'idx_infos_schedule');
        });
    }

    public function down(): void {
        Schema::table('infos', function (Blueprint $t) {
            $t->dropIndex('idx_infos_slider_active_order');
            $t->dropIndex('idx_infos_schedule');

            $t->dropColumn([
                'slider_name','subtitle','button_text','link_url',
                'sort_order','is_active','start_at','end_at'
            ]);
        });
    }
};
