@extends('layouts.admin')

@section('title', 'Detail Lamaran - Admin Panel')
@section('header_title', 'Detail Lamaran')

@section('content')
<div class="row">
    <!-- Kolom Kiri: Detail Pelamar -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold">Informasi Pelamar</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Posisi Dilamar</label>
                    <div class="fs-5 fw-bold text-primary">{{ $jobApplication->career ? $jobApplication->career->title : 'Posisi Tidak Tersedia' }}</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Nama Lengkap</label>
                    <div class="fw-bold">{{ $jobApplication->name }}</div>
                </div>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Email</label>
                    <div><a href="mailto:{{ $jobApplication->email }}">{{ $jobApplication->email }}</a></div>
                </div>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Nomor HP</label>
                    <div><a href="tel:{{ $jobApplication->phone }}">{{ $jobApplication->phone }}</a></div>
                </div>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Lokasi</label>
                    <div>{{ $jobApplication->location }}</div>
                </div>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Sumber Informasi</label>
                    <div>{{ $jobApplication->source }}</div>
                </div>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold">Waktu Melamar</label>
                    <div>{{ $jobApplication->created_at->format('d F Y, H:i') }}</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="small text-muted text-uppercase fw-bold mb-2">Resume / CV</label>
                    @if($jobApplication->cv_path)
                        <div class="bg-light p-3 rounded d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file-pdf fs-3 text-danger me-3"></i>
                                <div>
                                    <div class="small fw-bold">Dokumen CV</div>
                                    <div class="small text-muted">Klik tombol download</div>
                                </div>
                            </div>
                            <!-- Assuming CV is stored in public disk -->
                            <a href="{{ asset('storage/' . $jobApplication->cv_path) }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="fas fa-download me-1"></i> Download
                            </a>
                        </div>
                    @else
                        <div class="text-danger small">Tidak ada CV dilampirkan.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Kirim Balasan -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0 fw-bold">Kirim Balasan Email</h6>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.job-applications.reply', $jobApplication->id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Subjek Email <span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="Update Lamaran - {{ $jobApplication->career ? $jobApplication->career->title : '' }}" required>
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pesan <span class="text-danger">*</span></label>
                        <textarea name="message" id="editor" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        <div class="form-text small">Pesan ini akan dikirim ke <strong>{{ $jobApplication->email }}</strong>.</div>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-paper-plane me-2"></i> Kirim Email</button>
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
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
            placeholder: 'Tulis pesan balasan Anda di sini...'
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
