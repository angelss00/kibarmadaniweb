<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::create('testimonials', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('photo')->nullable();  // Kolom untuk foto
        $table->text('testimony');
        $table->timestamps();
    });
}

};
