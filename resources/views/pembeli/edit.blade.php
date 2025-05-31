@extends('layouts.app')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-sm rounded w-100" style="max-width: 360px;"> {{-- Batasi lebar maksimal --}}
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Edit Pembeli</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pembeli.update', $pembeli->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control form-control-sm" value="{{ $pembeli->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-sm" required>
                        <option value="L" {{ $pembeli->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $pembeli->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control form-control-sm" rows="2" required>{{ $pembeli->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control form-control-sm" value="{{ $pembeli->no_hp }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pembeli.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
