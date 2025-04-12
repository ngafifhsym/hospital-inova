<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    public function obats()
{
    return $this->belongsToMany(Obat::class, 'kunjungan_obat'); // pakai pivot table
}
}
