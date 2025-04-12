<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Tindakan;
use App\Models\User;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kunjungan.index',[
            'kunjungans' => Kunjungan::with(['pasien'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kunjungan.create',[
            'pasiens' => Pasien::all(),
            'dokters' => Pegawai::where('jabatan', 'Dokter')->get(),
            'tindakans' => Tindakan::all(),
            // 'dokters' => User::where('role', 'dokter')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tgl_kunjungan' => 'required|date',          
            'jenis_kunjungan' => 'required|in:Rawat Jalan,Rawat Inap,Emergency', 
            'keluhan' => 'required|min:10', 
            'status' => 'required|in:Pending,Selesai,Lunas', 
            'pegawai_id' => 'nullable|exists:pegawais,id', 
            'tindakan_id' => 'required|exists:tindakans,id', 
        ]);
        

        Kunjungan::create($validatedData);

        return redirect('/kunjungan')->with('success', 'Kunjungan berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Kunjungan $kunjungan)
    {
        return view('dashboard.kunjungan.show',[
            'kunjungan' => $kunjungan,
            'pasiens' => Pasien::all(),
            'dokters' => Pegawai::where('jabatan', 'Dokter')->get(),
            'tindakans' => Tindakan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        Kunjungan::destroy($kunjungan->id);

        return back()->with('success', 'Berhasil Dihapus');
    }
}
