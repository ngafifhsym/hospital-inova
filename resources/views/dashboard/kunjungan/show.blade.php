@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-center mb-5">Tambah Kunjungan Pasien</h1>

<form action="/kunjungan" method="POST">
    @csrf
    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
        <!-- Nama Pasien -->
        <div class="p-2">
            <div class="mb-3">
                <label for="pasien_id" class="form-label">Nama Pasien</label>
                <select name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id"  readonly disabled>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}" {{ old('pasien_id', $kunjungan->pasien_id ?? '') == $pasien->id ? 'selected' : '' }}>
                            {{ $pasien->nama }} - {{ $pasien->nik }}
                        </option>
                    @endforeach
                </select>
                @error('pasien_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Tanggal Kunjungan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="tgl_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="datetime-local" name="tgl_kunjungan" class="form-control @error('tgl_kunjungan') is-invalid @enderror" id="tgl_kunjungan" 
                       value="{{ old('tgl_kunjungan', isset($kunjungan->tgl_kunjungan) ? $kunjungan->tgl_kunjungan : date('Y-m-d\TH:i')) }}" required readonly>
                @error('tgl_kunjungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Jenis Kunjungan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="jenis_kunjungan" class="form-label">Jenis Kunjungan</label>
                <select name="jenis_kunjungan" class="form-control @error('jenis_kunjungan') is-invalid @enderror" id="jenis_kunjungan" required disabled>
                    <option value="">-- Pilih Jenis Kunjungan --</option>
                    <option value="Rawat Jalan" {{ old('jenis_kunjungan', $kunjungan->jenis_kunjungan ?? '') == 'Rawat Jalan' ? 'selected' : '' }}>Rawat Jalan</option>
                    <option value="Rawat Inap" {{ old('jenis_kunjungan', $kunjungan->jenis_kunjungan ?? '') == 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap</option>
                    <option value="Emergency" {{ old('jenis_kunjungan', $kunjungan->jenis_kunjungan ?? '') == 'Emergency' ? 'selected' : '' }}>Emergency</option>
                </select>
                @error('jenis_kunjungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        {{-- Keluhan --}}
        <div class="p-2">
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror " id="keluhan" rows="3" required readonly >{{ old('keluhan', $kunjungan->keluhan) }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Tindakan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="tindakan_id" class="form-label">Tindakan</label>
                <select name="tindakan_id" class="form-control @error('tindakan_id') is-invalid @enderror" id="tindakan_id" required disabled>
                    <option value="">-- Pilih Tindakan --</option>
                    @foreach($tindakans as $tindakan)
                        <option value="{{ $tindakan->id }}" {{ old('tindakan_id', $kunjungan->tindakan_id ?? '') == $tindakan->id ? 'selected' : '' }}>
                            {{ $tindakan->nama }}
                        </option>
                    @endforeach
                </select>
                @error('tindakan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Dokter -->
        <div class="p-2">
            <div class="mb-3">
                <label for="pegawai_id" class="form-label">Dokter</label>
                <select name="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror" id="pegawai_id" disabled>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ old('pegawai_id', $kunjungan->pegawai_id ?? '') == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->name }} - {{ $dokter->jabatan }}
                        </option>
                    @endforeach
                </select>
                @error('pegawai_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Status Kunjungan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="status" class="form-label">Status Kunjungan</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required disabled>
                    <option value="Pending" {{ old('status', $kunjungan->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Selesai" {{ old('status', $kunjungan->status ?? '') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Lunas" {{ old('status', $kunjungan->status ?? '') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
                @error('status')
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
