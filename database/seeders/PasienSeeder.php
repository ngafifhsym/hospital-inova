<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'nama' => 'John Doe',
            'nik' => '1234567890123456',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '1990-05-10',
            'no_hp' => '081234567890',
        ]);

        Pasien::create([
            'nama' => 'Jane Smith',
            'nik' => '9876543210987654',
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '1992-07-20',
            'no_hp' => '082345678901',
        ]);
        Pembayaran::create([
            'kunjungan_id' => 1, // pastikan ini ID kunjungan yang valid
            'total_biaya' => 100000,
            'status' => 'Belum Lunas'
        ]);
        
    }
}
