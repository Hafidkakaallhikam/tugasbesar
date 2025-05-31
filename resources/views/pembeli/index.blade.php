@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-primary">Daftar Pembeli</h5>
            <form action="{{ route('pembeli.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari pembeli..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('pembeli.create') }}" class="btn btn-primary ms-3">Tambah Pembeli</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembelis as $index => $pembeli)
                        <tr>
                            <td>{{ $index + $pembelis->firstItem() }}</td>
                            <td>{{ $pembeli->nama }}</td>
                            <td>{{ $pembeli->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $pembeli->alamat }}</td>
                            <td>{{ $pembeli->no_hp }}</td>
                            <td class="text-center">
                                <a href="{{ route('pembeli.edit', $pembeli->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pembeli.destroy', $pembeli->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pembeli.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="m-3">
            {{ $pembelis->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection