@extends('layouts.admin')

@section('title', 'Edit Layanan - Admin Panel')
@section('header_title', 'Edit Layanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Layanan</label>
                        @if($service->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" class="rounded" width="150">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kutipan Singkat (Excerpt)</label>
                        <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $service->excerpt) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Konten Lengkap</label>
                        <textarea name="content" id="editor" class="form-control">{{ old('content', $service->content) }}</textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
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
