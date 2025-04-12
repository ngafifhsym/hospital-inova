<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $wilayah = ['Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Yogyakarta'];
        foreach ($wilayah as $w) {
            Wilayah::create(['nama' => $w]);
        }
    }
}
