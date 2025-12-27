@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('header_title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
   

   

    <!-- Stats Card 3 -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-muted small fw-bold text-uppercase">Dokter Aktif</span>
                    <div class="bg-light text-info rounded p-2">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1">{{ $doctors }}</h3>
                <span class="text-muted small">Sedang praktek</span>
            </div>
        </div>
    </div>

    <!-- Stats Card 4 -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-muted small fw-bold text-uppercase">Artikel Berita</span>
                    <div class="bg-light text-danger rounded p-2">
                        <i class="fas fa-newspaper"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-1">{{ $articles }}</h3>
               
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h6 class="mb-0 fw-bold">Janji Temu Terbaru</h6>
                <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4">Nama Pasien</th>
                            <th class="border-0 py-3">Dokter</th>
                            <th class="border-0 py-3">Tanggal</th>
                            <th class="border-0 py-3">Status</th>
                            <th class="border-0 py-3 pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        JD
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">John Doe</div>
                                        <div class="small text-muted">Pemeriksaan Mata</div>
                                    </div>
                                </div>
                            </td>
                            <td>Dr. Sarah Johnson</td>
                            <td>12 Des 2025, 09:00</td>
                            <td><span class="badge bg-warning-subtle text-warning">Menunggu</span></td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        AS
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">Ahmad Santoso</div>
                                        <div class="small text-muted">Operasi Katarak</div>
                                    </div>
                                </div>
                            </td>
                            <td>Dr. Budi Gunawan</td>
                            <td>12 Des 2025, 10:30</td>
                            <td><span class="badge bg-success-subtle text-success">Confirmed</span></td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        ML
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">Maria Larasati</div>
                                        <div class="small text-muted">Konsultasi</div>
                                    </div>
                                </div>
                            </td>
                            <td>Dr. Siti Aminah</td>
                            <td>12 Des 2025, 13:00</td>
                            <td><span class="badge bg-danger-subtle text-danger">Cancelled</span></td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-light text-primary"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
-->
@endsection
