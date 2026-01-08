@extends('layouts.admin')

@section('title', 'Ko - Klinik Mata Tritya')

@section('header_title', 'Pengaturan Umum')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="fw-bold text-primary mb-0">Konfigurasi Mode Perbaikan</h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.settings.update-general') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status Mode Perbaikan</label>
                            <div class="form-check form-switch d-flex align-items-center ms-1 gap-3 px-0">
                                <input class="form-check-input ms-0" type="checkbox" role="switch" id="maintenance_mode"
                                    name="maintenance_mode" style="width: 3em; height: 1.5em;"
                                    {{ $maintenance_mode === 'true' ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="maintenance_mode">
                                    Aktifkan untuk menutup akses publik sementara
                                </label>
                            </div>
                            <div class="form-text text-muted small mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Jika diaktifkan, pengunjung akan melihat halaman "Sedang Renovasi". Admin tetap dapat
                                mengakses panel ini.
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
