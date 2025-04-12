@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Tambahkan Data Pegawai</h1>
<form action="/tindakan" method="post">
    @csrf
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tindakan</label>
                <input type="text" name="nama" class="form-control @error('nama')
                    is-invalid
                @enderror" id="nama">
            </div>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi')
                    is-invalid
                @enderror" id="deskripsi">
            </div>
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="biaya" class="form-label">biaya</label>
                <input type="number" name="biaya" class="form-control @error('biaya')
                    is-invalid
                @enderror" id="biaya" aria-describedby="emailHelp">
            </div>
            @error('biaya')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary align-self-end">Submit</button>
</form>

@endsection