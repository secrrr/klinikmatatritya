@extends('layouts.admin')

@section('title', 'Edit Asuransi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Asuransi</h1>
        <a href="{{ route('admin.insurances.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card mb-4 shadow">
        <div class="card-body">
            <form action="{{ route('admin.insurances.update', $insurance->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama (Optional)</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $insurance->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo (Biarkan kosong jika tidak ingin mengubah)</label>
                    <div class="mb-2">
                        <img src="{{ Storage::url($insurance->logo) }}" alt="{{ $insurance->name }}" width="100">
                    </div>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                        name="logo" accept="image/*">
                    <small class="text-muted">Format: jpg, jpeg, png, gif, svg. Max: 2MB.</small>
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
