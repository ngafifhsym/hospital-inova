@extends('dashboard.layouts.main')
@section('container')
<h2>Data Obat</h2>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
    </div>
@endif
  <a href="/obat/create" class="btn btn-primary mb-3">Tambah Data Obat</a>
<div class="table-responsive small">
  @if ($obats->count())
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($obats as $obat)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $obat->nama }}</td>
        <td>{{ $obat->deskripsi }}</td>
        <td>{{ $obat->harga }}</td>
        <td>
          {{-- <i data-feather="home"></i> --}}
          <a href="/obat/{{ $obat->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
          <a href="/obat/{{ $obat->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
          <form action="/obat/{{ $obat->id }}" method="post" class="d-inline">
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