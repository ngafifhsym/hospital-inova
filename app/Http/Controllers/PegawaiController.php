<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pegawai.index',[
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pegawais',
            'nip' => 'required|numeric',
            'nohp' => 'required|numeric'
        ]);

        Pegawai::create($validatedData);

        return redirect('/pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.show',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.pegawai.edit',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'jabatan' => 'required',
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'nip' => 'required|numeric',
            'nohp' => 'required|numeric'
        ]);

        $pegawai->update($validatedData);

        return redirect('/pegawai')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);

        return back()->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
