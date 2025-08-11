<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiMisiImagesTable extends Migration
{
    public function up()
    {
        Schema::create('visi_misi_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visi_misi_id');
            $table->foreign('visi_misi_id')->references('id')->on('visi_misi')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visi_misi_images');
    }
}
