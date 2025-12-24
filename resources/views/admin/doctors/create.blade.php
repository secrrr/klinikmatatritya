@extends('layouts.admin')

@section('title', 'Tambah Dokter - Admin Panel')
@section('header_title', 'Tambah Dokter Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: dr. Budi Santoso, Sp.M" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Spesialisasi</label>
                        <input type="text" name="specialty" class="form-control @error('specialty') is-invalid @enderror" value="{{ old('specialty') }}" placeholder="Contoh: Spesialis Katarak">
                        @error('specialty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto Dokter</label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Format: JPG, PNG. Maks: 2MB. Disarankan rasio 1:1 atau portrait.</div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor Telepon (Opsional)</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="0812...">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Biografi Singkat</label>
                        <textarea name="bio" class="form-control" rows="4" placeholder="Deskripsi singkat tentang dokter...">{{ old('bio') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Dokter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
