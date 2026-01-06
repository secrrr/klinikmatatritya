@extends('layouts.admin')

@section('title', 'Tambah FAQ - Admin Panel')
@section('header_title', 'Tambah FAQ Baru')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.faqs.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                            <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach (\App\Models\Faq::CATEGORIES as $key => $label)
                                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                                        {{ $label }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pertanyaan <span class="text-danger">*</span></label>
                            <input type="text" name="question"
                                class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}"
                                placeholder="Contoh: Apa itu LASIK?" required>
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Jawaban <span class="text-danger">*</span></label>
                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" rows="5"
                                placeholder="Tulis jawaban di sini..." required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Aktifkan FAQ ini?
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Simpan FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
