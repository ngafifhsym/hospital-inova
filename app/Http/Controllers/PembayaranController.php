<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index', [
            'pembayarans' => Pembayaran::with('kunjungan.pasien')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.pembayaran.create', [
            'pasiens' => Pasien::all()
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'pasien_id' => 'required|exists:pasiens,id',
        'jenis_kunjungan' => 'required|string',
        'tindakan_harga' => 'required|numeric|min:0',
        'tindakan_qty' => 'required|integer|min:1',
        'obat_harga' => 'required|numeric|min:0',
        'obat_qty' => 'required|integer|min:1',
        'status' => 'required|string',
    ]);

    // Simpan data kunjungan
    $kunjungan = Kunjungan::create([
        'pasien_id' => $validated['pasien_id'],
        'pegawai_id' => auth()->user()->pegawai->id ?? 1, // atau disesuaikan
        'tindakan_id' => 1, // jika belum dipilih dari form, set dummy dulu
        'jenis_kunjungan' => $validated['jenis_kunjungan'],
        'status' => $validated['status'],
        'tgl_kunjungan' => now(),
        'keluhan' => '-', // kalau tidak disediakan
    ]);

    // Hitung total
    $totalBiaya = ($validated['tindakan_harga'] * $validated['tindakan_qty']) +
                  ($validated['obat_harga'] * $validated['obat_qty']);

    // Simpan data pembayaran
    Pembayaran::create([
        'kunjungan_id' => $kunjungan->id,
        'total_biaya' => $totalBiaya,
        'status' => $validated['status'],
    ]);

    return redirect('/kunjungan')->with('success', 'Kunjungan dan pembayaran berhasil ditambahkan.');
}


    public function show(Pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.struk', [
            'pembayaran' => $pembayaran->load('kunjungan.pasien')
        ]);
    }

    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
