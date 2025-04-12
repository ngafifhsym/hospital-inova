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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Tablet', 'Kapsul', 'Sirup', 'Salep']);
            $table->text('deskripsi')->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga', 10, 2);
            $table->string('satuan', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
