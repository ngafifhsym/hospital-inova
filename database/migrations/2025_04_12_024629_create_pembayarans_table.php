<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            // Relasi ke kunjungan
            $table->foreignId('kunjungan_id')->constrained()->onDelete('cascade');

            // Kolom pembayaran
            $table->integer('total_biaya')->default(0);
            $table->string('status')->default('Belum Lunas'); // Lunas / Belum Lunas

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
}
