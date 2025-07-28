<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('file_downloads', function (Blueprint $table) {
            $table->id(); // BIGINT, Primary key

            $table->string('title', 255); // Judul file
            $table->string('slug', 255)->unique(); // Slug URL (opsional SEO)
            $table->text('description')->nullable(); // Deskripsi opsional

            $table->string('file_path', 255); // Path/URL file di storage

            $table->unsignedBigInteger('category_id')->nullable(); // Relasi ke tabel kategori (opsional)

            $table->string('file_type', 50)->nullable(); // Ekstensi file, contoh: pdf, docx, xlsx
            $table->bigInteger('file_size')->nullable(); // Ukuran file dalam byte

            $table->string('uploader', 100)->nullable(); // Nama pengunggah file

            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->bigInteger('download_count')->default(0); // Jumlah unduhan

            $table->timestamps(); // created_at dan updated_at

            // Foreign key jika ada tabel download_categories
            $table->foreign('category_id')->references('id')->on('download_categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file_downloads');
    }
};
