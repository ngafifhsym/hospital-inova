<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.obat.index',[
            'obats' => Obat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string',
        ]);

        // Simpan ke database
        Obat::create($validatedData);

        // Redirect ke halaman daftar obat dengan pesan sukses
        return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        return view('dashboard.obat.show', [
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('dashboard.obat.edit',[
            'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|string',
        ]);

        $obat->update($validatedData);

        return redirect('/obat')->with('success', 'Data obat berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);

        return back()->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
