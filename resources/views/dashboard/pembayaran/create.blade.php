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
                <select name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" required>
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">{{ $pasien->nama }} - {{ $pasien->nik }}</option>
                    @endforeach
                </select>
                @error('pasien_id')
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
                <select name="jenis_kunjungan" class="form-control @error('jenis_kunjungan') is-invalid @enderror" id="jenis_kunjungan" required>
                    <option value="">-- Pilih Jenis Kunjungan --</option>
                    <option value="Rawat Jalan">Rawat Jalan</option>
                    <option value="Rawat Inap">Rawat Inap</option>
                    <option value="Emergency">Emergency</option>
                </select>
                @error('jenis_kunjungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Tindakan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="tindakan_harga" class="form-label">Harga Tindakan (Rp)</label>
                <div class="input-group">
                    <input type="number" name="tindakan_harga" id="tindakan_harga" class="form-control" placeholder="Masukkan harga tindakan" required>
                    <input type="number" name="tindakan_qty" id="tindakan_qty" class="form-control" value="1" min="1" required>
                </div>
            </div>
        </div>

        <!-- Obat -->
        <div class="p-2">
            <div class="mb-3">
                <label for="obat_harga" class="form-label">Harga Obat (Rp)</label>
                <div class="input-group">
                    <input type="number" name="obat_harga" id="obat_harga" class="form-control" placeholder="Masukkan harga obat" required>
                    <input type="number" name="obat_qty" id="obat_qty" class="form-control" value="1" min="1" required>
                </div>
            </div>
        </div>

        <!-- Total Harga -->
        <div class="p-2">
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" id="total_harga" class="form-control" value="0" disabled>
            </div>
        </div>

        <!-- Status Kunjungan -->
        <div class="p-2">
            <div class="mb-3">
                <label for="status" class="form-label">Status Kunjungan</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Lunas">Lunas</option>
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

<script>
    const tindakanHargaInput = document.getElementById('tindakan_harga');
    const tindakanQtyInput = document.getElementById('tindakan_qty');
    const obatHargaInput = document.getElementById('obat_harga');
    const obatQtyInput = document.getElementById('obat_qty');
    const totalHargaInput = document.getElementById('total_harga');

    function updateTotalHarga() {
        let total = 0;

        const tindakanHarga = parseInt(tindakanHargaInput.value) || 0;
        const tindakanQty = parseInt(tindakanQtyInput.value) || 1;
        total += tindakanHarga * tindakanQty;

        const obatHarga = parseInt(obatHargaInput.value) || 0;
        const obatQty = parseInt(obatQtyInput.value) || 1;
        total += obatHarga * obatQty;

        totalHargaInput.value = total ? `Rp ${total.toLocaleString('id-ID')}` : 'Rp 0';
    }

    tindakanHargaInput.addEventListener('input', updateTotalHarga);
    tindakanQtyInput.addEventListener('input', updateTotalHarga);
    obatHargaInput.addEventListener('input', updateTotalHarga);
    obatQtyInput.addEventListener('input', updateTotalHarga);
</script>
@endsection
