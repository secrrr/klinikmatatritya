@extends('layouts.admin')

@section('title', 'Tambah Karir - Admin Panel')
@section('header_title', 'Tambah Karir Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.careers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Posisi / Judul <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Contoh: General Practitioner">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tipe Pekerjaan <span class="text-danger">*</span></label>
                            <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                <option value="">Pilih Tipe</option>
                                <option value="Penuh Waktu" {{ old('type') == 'Penuh Waktu' ? 'selected' : '' }}>Penuh Waktu</option>
                                <option value="Paruh Waktu" {{ old('type') == 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu</option>
                                <option value="Kontrak" {{ old('type') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                <option value="Magang" {{ old('type') == 'Magang' ? 'selected' : '' }}>Magang</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', 'Jakarta') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                        <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Deskripsi Singkat <span class="text-danger">*</span></label>
                            <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', 'Klinik Mata Tritya membuka kesempatan bagi tenaga profesional untuk bergabung sebagai bagian dari tim pelayanan kesehatan mata yang unggul dan terintegrasi.') }}</textarea>
                        </div>
                        <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" id="isActiveCheck" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="isActiveCheck">Status Aktif</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.careers.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Karir</button>
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
