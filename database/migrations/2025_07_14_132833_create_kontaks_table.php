<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaksTable extends Migration
{
    public function up()
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id(); // id BIGINT Auto Increment
            $table->string('name', 100); // Nama pengirim
            $table->string('email', 100); // Email pengirim
            $table->string('subject', 150)->nullable(); // Subjek pesan
            $table->text('message'); // Isi pesan
            $table->string('phone', 20)->nullable(); // Nomor telepon / WA
            $table->enum('status', ['new', 'read', 'responded', 'archived'])->default('new'); // Status
            $table->timestamp('responded_at')->nullable(); // Waktu ditanggapi
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontaks');
    }
}
