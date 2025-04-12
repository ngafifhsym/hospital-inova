@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Edit Data Obat</h1>
<form action="/obat/{{ $obat->id }}" method="post">
    @method('PUT')
    @csrf

    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Obat</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $obat->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Tablet" {{ old('kategori', $obat->kategori) == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Kapsul" {{ old('kategori', $obat->kategori) == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                    <option value="Sirup" {{ old('kategori', $obat->kategori) == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                    <option value="Salep" {{ old('kategori', $obat->kategori) == 'Salep' ? 'selected' : '' }}>Salep</option>
                    <option value="Injeksi" {{ old('kategori', $obat->kategori) == 'Injeksi' ? 'selected' : '' }}>Injeksi</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ old('stok', $obat->stok) }}">
                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga', $obat->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="satuan">
                    <option value="">-- Pilih Satuan --</option>
                    <option value="Strip" {{ old('satuan', $obat->satuan) == 'Strip' ? 'selected' : '' }}>Strip</option>
                    <option value="Botol" {{ old('satuan', $obat->satuan) == 'Botol' ? 'selected' : '' }}>Botol</option>
                    <option value="Tablet" {{ old('satuan', $obat->satuan) == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    <option value="Vial" {{ old('satuan', $obat->satuan) == 'Vial' ? 'selected' : '' }}>Vial</option>
                    <option value="Tube" {{ old('satuan', $obat->satuan) == 'Tube' ? 'selected' : '' }}>Tube</option>
                </select>
                @error('satuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
    <a href="{{ url('/obat') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>

@endsection
