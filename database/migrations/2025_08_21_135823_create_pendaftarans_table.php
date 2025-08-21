<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat'); // ➝ alamat manual ketikan
            $table->unsignedBigInteger('pelatihan_id');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('pelatihan_id')
                ->references('id')
                ->on('pelatihans')
                ->onDelete('cascade');
        });
    }
};
