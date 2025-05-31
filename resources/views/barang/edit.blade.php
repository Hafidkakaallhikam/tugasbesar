@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Edit Barang</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar (opsional)</label><br>
                    @if($barang->gambar)
                        <img src="{{ asset('uploads/' . $barang->gambar) }}" width="100" class="mb-2"><br>
                    @endif
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-control form-control-sm" required>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
