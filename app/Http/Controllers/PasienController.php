<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pasien.index', [
            'pasiens' => Pasien::with(['kunjungans.tindakans'])->get()
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|min:2',
            'nik' => 'required|string|unique:pasiens,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status' => 'required|',
            'no_hp' => 'required|numeric|digits_between:10,15'
        ]);

        
        Pasien::create($validatedData);

        return redirect('/pendaftaranPasien')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);

        return back()->with('success', 'Data Pasien Sudah Terhapus');
    }
}
