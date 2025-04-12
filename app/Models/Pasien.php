<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function kunjungans(){
        return $this->hasMany(Kunjungan::class, 'pasien_id');
    }
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class, 'pasien_id');
    }
    public function tindakan(){
        return $this->belongsToMany(Tindakan::class);
    }
}
