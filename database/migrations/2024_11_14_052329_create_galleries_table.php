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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts'); // Menghubungkan dengan tabel posts
            $table->integer('position'); // Posisi agenda
            $table->string('status'); // Status agenda (aktif/tidak aktif)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries'); // Menghapus tabel agendas jika migrasi dibatalkan
    }
};