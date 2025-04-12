<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'name' => 'Dr. Ahmad Fauzi',
            'jabatan' => 'Dokter',
            'email' => 'ahmad.fauzi@example.com',
            'nip' => '112233445566',
            'nohp' => '085123456789',
        ]);

        Pegawai::create([
            'name' => 'Siti Aisyah',
            'jabatan' => 'Dokter',
            'email' => 'siti.aisyah@example.com',
            'nip' => '223344556677',
            'nohp' => '085234567890',
        ]);
        Tindakan::create([
            'nama' => 'Poli Umum',
            'deskripsi' => 'Pengobatan Umum',
            'biaya' => '50000',
        ]);
        Tindakan::create([
            'nama' => 'Cek Laboratorium',
            'deskripsi' => 'Cek darah dan lainnya',
            'biaya' => '70000',
        ]);
    }
}
