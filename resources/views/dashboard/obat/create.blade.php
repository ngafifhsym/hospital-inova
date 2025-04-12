@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Tambahkan Data Obat</h1>
<form action="/obat" method="post">
    @csrf
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Obat</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Sirup">Sirup</option>
                    <option value="Salep">Salep</option>
                    <option value="Injeksi">Injeksi</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3"></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok">
                @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="p-2">
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="satuan">
                    <option value="">-- Pilih Satuan --</option>
                    <option value="Strip">Strip</option>
                    <option value="Botol">Botol</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Vial">Vial</option>
                    <option value="Tube">Tube</option>
                </select>
                @error('satuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary align-self-end">Submit</button>
</form>

@endsection
