@extends('layouts.admin')

@section('title', 'Edit Dokter - Admin Panel')
@section('header_title', 'Edit Data Dokter')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $doctor->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Spesialisasi</label>
                        <input type="text" name="specialty" class="form-control @error('specialty') is-invalid @enderror" value="{{ old('specialty', $doctor->specialty) }}">
                        @error('specialty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto Dokter</label>
                        @if($doctor->photo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $doctor->photo) }}" alt="Current Photo" class="rounded" width="100">
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Biarkan kosong jika tidak ingin mengubah foto.</div>
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor Telepon (Opsional)</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $doctor->phone) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Biografi Singkat</label>
                        <textarea name="bio" class="form-control" rows="4">{{ old('bio', $doctor->bio) }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
