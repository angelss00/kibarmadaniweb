<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();

            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('galerry_categories')
                  ->onDelete('set null');

            $table->foreignId('album_id')
                  ->nullable()
                  ->constrained('albums')
                  ->onDelete('set null');

            $table->string('uploader')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->date('taken_at')->nullable();
            $table->boolean('is_featured')->default(false);

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};

