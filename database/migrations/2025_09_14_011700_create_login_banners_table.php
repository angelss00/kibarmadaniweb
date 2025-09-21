<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('login_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');          // path gambar (storage/app/public/...)
            $table->text('quote');                 // kalimatnya
            $table->string('author')->nullable();  // nama sumber
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('login_banners');
    }
};
