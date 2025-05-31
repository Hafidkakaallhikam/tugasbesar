@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card shadow-sm rounded w-100" style="max-width: 360px;">
        <div class="card-header bg-warning text-white text-center">
            <h5 class="mb-0">Edit Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="{{ $supplier->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="{{ $supplier->alamat }}" required>
                </div>

                <div class="mb-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control form-control-sm" id="kode_pos" name="kode_pos" value="{{ $supplier->kode_pos }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('supplier.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-sm btn-success">Update Supplier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection