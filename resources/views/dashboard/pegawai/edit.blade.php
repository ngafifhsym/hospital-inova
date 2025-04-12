@extends('dashboard.layouts.main')
@section('container')

<h1 class="text-center mb-5">Tambahkan Data Pegawai</h1>
<form action="/pegawai/{{ $pegawai->id }}" method="post">
    @method('put')
    @csrf
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <div class="p-2">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pegawai</label>
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" value="{{ old('name', $pegawai->name) }}">
            </div>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan')
                    is-invalid
                @enderror" id="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}">
            </div>
            @error('jabatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email')
                    is-invalid
                @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email', $pegawai->email) }}">
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP atau NIK</label>
                <input type="text" name="nip" class="form-control @error('nip')
                    is-invalid
                @enderror" id="nip" value="{{ old('nip', $pegawai->nip) }}">
            </div>
            @error('nip')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="p-2">
            <div class="mb-3">
                <label for="nohp" class="form-label">No Handphone atau No WA</label>
                <input type="text" name="nohp" class="form-control @error('nohp')
                    is-invalid
                @enderror" id="nohp" value="{{ old('nohp', $pegawai->nohp) }}">
            </div>
            @error('nohp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary align-self-end">Submit</button>
</form>

@endsection