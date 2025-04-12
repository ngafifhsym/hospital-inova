@extends('dashboard.layouts.main')
@section('container')
<h2>Data Kunjungan</h2>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
    </div>
@endif
  <a href="/kunjungan/create" class="btn btn-primary mb-3">Tambah Data Kunjungan</a>
<div class="table-responsive small">
  @if ($kunjungans->count())
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Nik</th>
        <th scope="col">Tanggal Kunjungan</th>
        <th scope="col">Status</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kunjungans as $kunjungan)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $kunjungan->pasien->nama }}</td>
        <td>{{ $kunjungan->pasien->nik }}</td>
        <td>{{ $kunjungan->tgl_kunjungan }}</td>
        <td>{{ $kunjungan->status }}</td>
        <td>
          {{-- <i data-feather="home"></i> --}}
          <a href="/kunjungan/{{ $kunjungan->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
          <a href="/kunjungan/{{ $kunjungan->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
          <form action="/kunjungan/{{ $kunjungan->id }}" method="post" class="d-inline">
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