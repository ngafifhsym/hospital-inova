<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class Kunjungan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    public function tindakan(){
        return $this->belongsTo(Tindakan::class,'tindakan_id');

    }
    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function pembayaran()
{
    return $this->hasMany(Pembayaran::class, 'kunjungan_id');
}
// Kunjungan.php
public function obats()
{
    return $this->hasMany(Obat::class, 'kunjungan_id');
}

}
