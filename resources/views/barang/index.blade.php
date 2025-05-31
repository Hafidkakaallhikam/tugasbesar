@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-primary">Daftar Barang</h5>
            <form action="{{ route('barang.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari barang..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('barang.create') }}" class="btn btn-primary ms-3">+ Tambah Barang</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success m-3">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $item)
                        <tr>
                            <td>{{ $index + $data->firstItem() }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('uploads/' . $item->gambar) }}" width="60" alt="gambar">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->kategori->nama ?? '-' }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Data Kosong</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="m-3">
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection