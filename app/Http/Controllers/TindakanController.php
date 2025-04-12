<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tindakan.index',[
            'tindakans' => Tindakan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tindakan.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'biaya' => 'required|numeric|min:0'
        ]);

        Tindakan::create($validatedData);

        return redirect('/tindakan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tindakan $tindakan)
    {
        return view('dashboard.tindakan.show',[
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tindakan $tindakan)
    {
        return view('dashboard.tindakan.edit',[
            'tindakan' => $tindakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'biaya' => 'required|numeric|min:0'
        ]);

        $tindakan->update($validatedData);

        return redirect('/tindakan')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tindakan $tindakan)
    {
        Tindakan::destroy($tindakan->id);

        return back()->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
