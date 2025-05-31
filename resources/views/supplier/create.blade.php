@extends('layouts.app')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-sm rounded w-100" style="max-width: 360px;">
        <div class="card-header bg-success text-white text-center">
            <h5 class="mb-0">Tambah Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" required>
                </div>

                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control form-control-sm" id="kode_pos" name="kode_pos" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('supplier.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-sm btn-success">Tambah Supplier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection