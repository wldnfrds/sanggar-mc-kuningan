<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul artikel
            $table->string('author'); // Pengarang
            $table->text('content'); // Isi artikel
            $table->string('summary')->nullable(); // Ringkasan artikel
            $table->string('img_url')->nullable(); // Untuk menyimpan URL gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
