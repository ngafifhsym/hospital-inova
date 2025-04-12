@extends('dashboard.layouts.main')
@section('container')
<h2>Data Pendaftaran Pasien</h2>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
    </div>
@endif
  <a href="/pendaftaranPasien/create" class="btn btn-primary mb-3">Tambah Data Pasien</a>
<div class="table-responsive small">
  @if ($pasiens->count())
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">NIK</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">No Hp</th>
        <th scope="col">Terakhir Berobat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pasiens as $pasien)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pasien->nama }}</td>
        <td>{{ $pasien->nik }}</td>
        <td>{{ $pasien->jenis_kelamin }}</td>
        <td>{{ $pasien->tanggal_lahir }}</td>
        <td>{{ $pasien->no_hp }}</td>
        <td>
          @foreach ($pasien->kunjungans as $kunjungan)
              {{ $kunjungan->tgl_kunjungan }}<br>
          @endforeach
      </td>
      {{-- <td>
          @foreach ($pasiens as $kunjungan)
              {{ $kunjungan->tindakan->nama ?? '-' }} <br>
          @endforeach
      </td> --}}
        <td>
          {{-- <i data-feather="home"></i> --}}
          <a href="/pendaftaranPasien/{{ $pasien->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
          <a href="/pendaftaranPasien/{{ $pasien->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
          <form action="/pendaftaranPasien/{{ $pasien->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger border-none" onclick="return confirm('Are You Sure ?')">
                  <i class="bi bi-x-lg"></i>
              </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p class="text-center fs-4">Tidak Ada Data Pegawai</p>
  @endif
</div>
@endsection