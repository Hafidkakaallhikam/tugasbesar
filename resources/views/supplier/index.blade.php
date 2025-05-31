@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Supplier</h6>

      {{-- Tombol Tambah dan Form Pencarian --}}
      <div class="d-flex">
        <a href="{{ route('supplier.create') }}" class="btn btn-sm btn-primary mr-2">Tambah Supplier</a>
        <form method="GET" action="{{ route('supplier.index') }}">
          <div class="input-group input-group-sm">
            <input type="text" name="search" class="form-control" placeholder="Cari supplier..." value="{{ request('search') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card-body">
      {{-- Menampilkan pesan sukses --}}
      @if (session('sukses'))
        <div class="alert alert-success">
          {{ session('sukses') }}
        </div>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered table-sm" width="100%">
          <thead class="thead-light">
            <tr>
              <th style="width: 50px;">No</th>
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>Kode Pos</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($data as $index => $supplier)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $supplier->nama }}</td>
                <td>{{ $supplier->alamat }}</td>
                <td>{{ $supplier->kode_pos }}</td>
                <td>
                  <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-muted">Tidak ada data.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection