@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Detail Data Obat</h1>
<form>
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Obat</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $obat->nama ?? '' }}" readonly>
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" class="form-control" id="kategori" disabled>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Tablet" {{ isset($obat) && $obat->kategori == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Kapsul" {{ isset($obat) && $obat->kategori == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                    <option value="Sirup" {{ isset($obat) && $obat->kategori == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                    <option value="Salep" {{ isset($obat) && $obat->kategori == 'Salep' ? 'selected' : '' }}>Salep</option>
                    <option value="Injeksi" {{ isset($obat) && $obat->kategori == 'Injeksi' ? 'selected' : '' }}>Injeksi</option>
                </select>
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" readonly>{{ $obat->deskripsi ?? '' }}</textarea>
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" value="{{ $obat->stok ?? '' }}" readonly>
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" id="harga" value="{{ $obat->harga ?? '' }}" readonly>
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-control" id="satuan" disabled>
                    <option value="">-- Pilih Satuan --</option>
                    <option value="Strip" {{ isset($obat) && $obat->satuan == 'Strip' ? 'selected' : '' }}>Strip</option>
                    <option value="Botol" {{ isset($obat) && $obat->satuan == 'Botol' ? 'selected' : '' }}>Botol</option>
                    <option value="Tablet" {{ isset($obat) && $obat->satuan == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Vial" {{ isset($obat) && $obat->satuan == 'Vial' ? 'selected' : '' }}>Vial</option>
                    <option value="Tube" {{ isset($obat) && $obat->satuan == 'Tube' ? 'selected' : '' }}>Tube</option>
                </select>
            </div>
        </div>
    </div>
    
    <a href="{{ url('/obat') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>

@endsection
