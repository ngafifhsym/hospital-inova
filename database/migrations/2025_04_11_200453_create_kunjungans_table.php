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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamp('tgl_kunjungan');
            $table->string('jenis_kunjungan');
            $table->text('keluhan');
            $table->foreignId('pasien_id');
            $table->foreignId('pegawai_id');
            $table->foreignId('tindakan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
