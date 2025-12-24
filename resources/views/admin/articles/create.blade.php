@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin Panel')
@section('header_title', 'Tambah Artikel Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Utama</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-text small">Format: JPG, PNG, GIF. Maks: 2MB.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Konten Artikel <span class="text-danger">*</span></label>
                        <textarea name="content" id="editor" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kutipan Singkat (Excerpt)</label>
                        <textarea name="excerpt" class="form-control" rows="3" placeholder="Ringkasan singkat artikel (opsional)">{{ old('excerpt') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Tanggal Publish</label>
                        <input type="date" name="published_at" class="form-control" value="{{ old('published_at', date('Y-m-d')) }}">
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
