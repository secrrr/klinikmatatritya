@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Kemitraan dan Karir')

@section('styles')
    <style>
        :root {
            --primary-navy: #182366;
            --accent-pink: #ec4899;
            --accent-pink-hover: #db2777;
            --light-bg: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }

        /* --- Section Kemitraan (Cards with Cutout) --- */
        .partnership-section {
            padding: 60px 0;
        }

        .partner-card {
            background: linear-gradient(135deg, #1e2a78 0%, #11184a 100%);
            border-radius: 20px;
            color: white;
            height: 240px;
            /* Tinggi card */
            position: relative;
            overflow: hidden;
            /* box-shadow: 0 10px 25px rgba(24, 35, 102, 0.15); */
            transition: transform 0.3s;
        }

        .partner-card:hover {
            transform: translateY(-5px);
        }

        /* Gambar Background */
        .partner-card-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.4;
            /* Opacity agar teks terbaca */
            transition: opacity 0.3s;
        }

        .partner-card:hover .partner-card-bg {
            opacity: 0.2;
            /* Lebih gelap saat hover */
        }

        /* Konten Teks */
        .partner-content {
            position: relative;
            z-index: 1;
            padding: 25px;
            height: 100%;
            display: flex;
            align-items: flex-end;
            padding-bottom: 30px;
            padding-right: 80px;
            /* Space agar tidak kena tombol */
        }

        .partner-title {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 1.3;
        }

        /* --- Logika Lekukan (Inverted Corner) --- */
        .white-corner {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 70px;
            height: 70px;
            background-color: var(--light-bg);
            /* Warna background halaman */
            border-top-left-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        /* Konektor Lekukan Atas */
        .white-corner::before {
            content: "";
            position: absolute;
            top: -30px;
            right: 0;
            width: 30px;
            height: 30px;
            background: transparent;
            border-bottom-right-radius: 50%;
            box-shadow: 10px 10px 0 var(--light-bg);
        }

        /* Konektor Lekukan Kiri */
        .white-corner::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: -30px;
            width: 30px;
            height: 30px;
            background: transparent;
            border-bottom-right-radius: 50%;
            box-shadow: 10px 10px 0 var(--light-bg);
        }

        /* Tombol Pink */
        .btn-pink-circle {
            width: 45px;
            height: 45px;
            background-color: var(--accent-pink);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(236, 72, 153, 0.4);
        }

        .btn-pink-circle:hover {
            background-color: var(--accent-pink-hover);
            color: white;
            transform: scale(1.1);
        }

        /* --- Section Karir (Table List) --- */
        .career-section {
            padding-bottom: 100px;
        }

        .career-box {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
        }

        /* Table Styling */
        .table-career th {
            font-weight: 700;
            font-size: 1.1rem;
            border-bottom: none;
            padding-bottom: 20px;
        }

        .table-career td {
            padding: 25px 0;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-career tr:last-child td {
            border-bottom: none;
        }

        .job-title {
            font-weight: 500;
            color: #333;
        }

        .job-type {
            color: #666;
        }

        .btn-lamar {
            border: 1px solid #ddd;
            background-color: white;
            color: #555;
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-lamar:hover {
            border-color: var(--primary-navy);
            background-color: var(--primary-navy);
            color: white;
        }

        /* Pagination */
        .pagination-container {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-link-custom {
            color: #888;
            padding: 5px 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .page-link-custom.active {
            color: var(--primary-navy);
            background-color: #eef2ff;
            border-radius: 5px;
        }

        .btn-prev {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ccc;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .btn-next {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--accent-pink);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(236, 72, 153, 0.3);
        }

        .btn-next:hover {
            background-color: var(--accent-pink-hover);
            color: white;
        }
    </style>
@endsection

@section('content')

    <!-- Section Kemitraan -->
    <section class="partnership-section">
        <div class="container">
            <h1 class="fw-bold mb-4" style="color: #333;">Kemitraan</h1>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="partner-card">
                        <!-- Image placeholder: Orang meeting/investor -->
                        <img src="https://img.freepik.com/free-photo/group-business-people-meeting-office_53876-14811.jpg"
                            class="partner-card-bg" alt="Investor">
                        <div class="partner-content">
                            <h4 class="partner-title">Investor Relation<br>Procedures</h4>
                        </div>
                        <div class="white-corner">
                            <a href="/investor" class="btn-pink-circle"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="partner-card">
                        <!-- Image placeholder: Alat mata/biru -->
                        <img src="https://img.freepik.com/free-photo/ophthalmology-microscope-close-up_23-2148847835.jpg"
                            class="partner-card-bg" alt="Medical Checkup">
                        <div class="partner-content">
                            <h4 class="partner-title">Eye Medical<br>Checkup</h4>
                        </div>
                        <div class="white-corner">
                            <a href="/hvf" class="btn-pink-circle"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="partner-card">
                        <!-- Image placeholder: Tangan bertumpuk/CSR -->
                        <img src="https://img.freepik.com/free-photo/unity-cooperation-hands-together-teamwork-concept_53876-21390.jpg"
                            class="partner-card-bg" alt="CSR">
                        <div class="partner-content">
                            <h4 class="partner-title">CSR<br>Procedures</h4>
                        </div>
                        <div class="white-corner">
                            <a href="/csr" class="btn-pink-circle"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Karir -->
    <section class="career-section">
        <div class="container">
            <!-- Header Karir -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                <h1 class="fw-bold mb-md-0 mb-3" style="color: #333;">Karir</h1>
                <div class="input-group" style="max-width: 300px;position: relative;">
                    <input type="text" class="form-control" placeholder="Search" id="careerSearchInput">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>

                    <div id="careerSearchResults" class="search-dropdown"></div>
                </div>
            </div>

            <!-- List Karir Box -->
            <div class="career-box">
                <div class="table-responsive">
                    <table class="table-career table-hover mb-0 table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Posisi</th>
                                <th style="width: 30%;">Jenis Pekerjaan</th>
                                <th style="width: 30%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($careers as $career)
                                <tr>
                                    <td class="job-title">{{ $career->title }}</td>
                                    <td class="job-type">{{ $career->type }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('fe.carier.show', $career->slug) }}" class="btn-lamar">Detail &
                                            Lamar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-5 text-center">Belum ada lowongan tersedia saat ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Custom Pagination -->
                <div class="pagination-container justify-content-center">
                    {{ $careers->links() }}
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            handleSearch('careerSearchInput', 'careerSearchResults');
        });
    </script>
@endsection
