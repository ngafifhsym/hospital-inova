@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Lihat Data Pegawai</h1>
<form action="/tindakan/{{ $tindakan->id }}" method="post">
    @method('put')
    @csrf
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pegawai</label>
                <input type="text" name="nama" class="form-control @error('nama')
                    is-invalid
                @enderror" id="nama" value="{{ old('nama', $tindakan->nama) }}" readonly>
            </div>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Jabatan</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi')
                    is-invalid
                @enderror" id="deskripsi" value="{{ old('deskripsi', $tindakan->deskripsi) }}" readonly>
            </div>
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="biaya" class="form-label">Email</label>
                <input type="biaya" name="biaya" class="form-control @error('biaya')
                    is-invalid
                @enderror" id="biaya" aria-describedby="emailHelp" value="{{ old('biaya', $tindakan->biaya) }}" readonly>
            </div>
            @error('biaya')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</form>

@endsection