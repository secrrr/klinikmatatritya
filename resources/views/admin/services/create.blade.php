@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin Panel')
@section('header_title', 'Tambah Layanan Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Contoh: Operasi Katarak" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Layanan</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Format: JPG, PNG. Maks: 2MB. Gambar ini akan muncul saat layanan dipilih.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kutipan Singkat (Excerpt)</label>
                        <textarea name="excerpt" class="form-control" rows="3" placeholder="Deskripsi singkat yang muncul di accordion...">{{ old('excerpt') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Konten Lengkap</label>
                        <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
