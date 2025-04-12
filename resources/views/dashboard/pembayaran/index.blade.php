@extends('dashboard.layouts.main')
@section('container')
<h2>Data Pembayaran</h2>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
    </div>
@endif
  <a href="/pembayaran/create" class="btn btn-primary mb-3">Tambah Data Pegawai</a>
<div class="table-responsive small">
  @if ($pembayarans->count())
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Nomor Whatsapp</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pembayarans as $pembayaran)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pembayaran->name }}</td>
        <td>{{ $pembayaran->jabatan }}</td>
        <td>{{ $pembayaran->nohp }}</td>
        <td>
          {{-- <i data-feather="home"></i> --}}
          <a href="/pembayaran/{{ $pembayaran->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
          <a href="/pembayaran/{{ $pembayaran->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
          <form action="/pembayaran/{{ $pembayaran->id }}" method="post" class="d-inline">
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
  <p class="text-center fs-4">Tidak Ada Data Pembayaran</p>
  @endif
</div>
@endsection