@extends('layouts.app')

@section('title', 'pembelian')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <h5 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h5>
                
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('pembelian.create') }}" class="btn btn-sm btn-primary">Tambah Pembelian</a>
                    
                    <form action="{{ route('pembelian.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control form-control-sm mr-2" placeholder="Cari pembelian...">
                        <button type="submit" class="btn btn-sm btn-primary ml-1">Cari</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembelians as $no => $p)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $p->barang->nama }}</td>
                                <td>{{ $p->supplier->nama }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>
                                    @if($p->status === 'Pending')
                                        <span class="badge badge-pill badge-warning px-3 py-2 text-dark font-weight-bold">Pending</span>
                                    @else
                                        <span class="badge badge-pill badge-success px-3 py-2">✔ Done</span>
                                    @endif
                                </td>
                                <td>
                                    @if($p->status === 'Pending')
                                        <a href="{{ route('pembelian.selesai', $p->id) }}" class="btn btn-sm btn-success mb-1">
                                            <i class="fas fa-check-circle"></i> Selesaikan
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-secondary mb-1" disabled>
                                            <i class="fas fa-check-circle"></i> Selesai
                                        </button>
                                    @endif

                                    <form action="{{ route('pembelian.destroy', $p->id) }}" method="POST" style="display:inline-block">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data pembelian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection