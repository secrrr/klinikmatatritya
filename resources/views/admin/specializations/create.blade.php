@extends('layouts.admin')

@section('title', 'Tambah Spesialisasi')

@section('header_title', 'Tambah Spesialisasi')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="fw-bold mb-0">Form Tambah Spesialisasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.specializations.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Spesialisasi</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block mb-3">Pilih Icon</label>
                            <div class="icon-grid d-flex flex-wrap gap-2">
                                @foreach ($icons as $icon)
                                    <div class="icon-option">
                                        <input type="radio" class="btn-check" name="icon" id="icon_{{ $loop->index }}"
                                            value="{{ $icon }}" {{ old('icon') == $icon ? 'checked' : '' }}
                                            required>
                                        <label
                                            class="btn btn-outline-secondary d-flex align-items-center justify-content-center"
                                            for="icon_{{ $loop->index }}" style="width: 60px; height: 60px;">
                                            <i class="{{ $icon }} fs-4"></i>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('icon')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-2">
                            <a href="{{ route('admin.specializations.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .btn-check:checked+.btn-outline-secondary {
            background-color: var(--primary-navy, #0d6efd);
            color: white;
            border-color: var(--primary-navy, #0d6efd);
        }
    </style>
@endsection
