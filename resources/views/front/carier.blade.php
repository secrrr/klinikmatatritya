@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Detail Karir')

@section('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        :root {
            --primary-navy: #182366;
            --light-blue-bg: #dbeafe;
            --light-bg: #f8fafc;
            --text-dark: #333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* --- Navbar --- */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 15px 0;
        }

        .nav-link {
            color: #333;
            font-weight: 500;
            margin-right: 15px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-navy);
            font-weight: 700;
        }

        .btn-janji {
            background-color: var(--light-blue-bg);
            color: #2563eb;
            font-weight: 600;
            border: none;
        }

        /* --- Hero Section --- */
        .hero-career {
            position: relative;
            background-image: url('https://img.freepik.com/free-photo/optometrist-trial-frame-phoropter_23-2148043642.jpg');
            /* Placeholder image */
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            color: white;
        }

        /* Overlay agar teks terbaca */
        .hero-career::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .breadcrumb-text {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .content-wrapper {
            margin-top: -150px;
            position: relative;
        }

        /* --- Main Content (White Cards) --- */
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
        }

        .content-card h4 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #111;
        }

        .content-card ul {
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .content-card ul li {
            margin-bottom: 10px;
            color: #555;
            line-height: 1.6;
        }

        /* Right Sidebar Styles */
        .sidebar-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 20px;
        }

        .btn-lamar-full {
            background-color: var(--primary-navy);
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            transition: background 0.3s;
        }

        .btn-lamar-full:hover {
            background-color: #11194d;
            color: white;
        }

        /* List Pekerjaan Lainnya */
        .other-job-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .other-job-item:last-child {
            border-bottom: none;
        }

        .other-job-title {
            font-weight: 600;
            color: #333;
            display: block;
        }

        .other-job-type {
            font-size: 0.85rem;
            color: #777;
        }

        .link-selengkapnya {
            color: var(--primary-navy);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-top: 10px;
        }

        .text-gray {
            color: #555;
        }

        /* --- Slider Section (Copied from previous logic) --- */
        .nav-arrows .btn-arrow {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #eee;
            color: var(--primary-navy);
            margin-left: 10px;
            transition: all 0.2s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .nav-arrows .btn-arrow:hover {
            background: var(--light-blue-bg);
            border-color: var(--light-blue-bg);
        }

        .news-card {
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            height: 420px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .news-card-img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .news-card-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-card-date {
            font-size: 0.8rem;
            color: #9ca3af;
            margin-bottom: 10px;
        }

        .news-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.4;
            flex-grow: 1;
        }

        .btn-full-width {
            background-color: var(--light-blue-bg);
            color: #2563eb;
            width: 100%;
            text-align: left;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: none;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero-career">
        <div class="hero-content container">
            <span class="breadcrumb-text">KARIR</span>
            <h1 class="fw-bold display-4 mt-2">{{ $career->title }}</h1>
        </div>
    </div>

    <div class="content-wrapper">
        <!-- Main Content -->
        <div class="container py-5">
            <div class="row">
                <!-- Left Column: Details -->
                <div class="col-lg-8">
                    <div class="content-card h-100">
                        <!-- WYSIWYG Content -->
                        <div class="career-description">
                            {!! $career->description !!}
                        </div>
                    </div>
                </div>

                <!-- Right Column: Summary & Others -->
                <div class="col-lg-4">
                    <!-- Deskripsi & Lamar -->
                    <div class="sidebar-card">
                        <h4>Deskripsi Pekerjaan</h4>
                        <div class="mb-3">
                            <span class="d-block text-muted small">Tipe Pekerjaan:</span>
                            <span class="fw-bold">{{ $career->type }}</span>
                        </div>
                         <div class="mb-3">
                            <span class="d-block text-muted small">Ringkasan:</span>
                            <span class="text-gray">{{ $career->short_description }}</span>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                            <span class="small text-gray">{{ $career->location }}</span>
                        </div>
                        <a href="{{ route('fe.job-form', ['career_id' => $career->id]) }}" class="btn-lamar-full text-center text-decoration-none">Lamar Sekarang</a>
                    </div>

                    <!-- Pekerjaan Lainnya -->
                    <div class="sidebar-card">
                        <h5 class="fw-bold mb-3"><i class="fas fa-briefcase text-muted me-2"></i>Pekerjaan Lainnya</h5>

                        @forelse($other_jobs as $other)
                        <div class="other-job-item">
                            <a href="{{ route('fe.carier.show', $other->slug) }}" class="other-job-title text-decoration-none">{{ $other->title }}</a>
                            <span class="other-job-type">{{ $other->type }}</span>
                        </div>
                        @empty
                        <div class="text-muted small">Tidak ada lowongan lain.</div>
                        @endforelse

                        <a href="{{ route('fe.cariers.index') }}" class="link-selengkapnya">Selengkapnya <i
                                class="fas fa-chevron-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Section: Postingan Terbaru -->
        <div class="container py-4">
            <div class="section-header d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Postingan Terbaru</h2>
                <div class="nav-arrows">
                    <button class="btn-arrow news-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn-arrow news-next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="news-card">
                            <img src="https://img.freepik.com/free-photo/modern-hospital-room_23-2148847819.jpg"
                                class="news-card-img" alt="Berita">
                            <div class="news-card-body">
                                <span class="news-card-date">30 Februari 2077</span>
                                <h5 class="news-card-title">Jangan Remehkan! 5 Tanda Gangguan</h5>
                                <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="news-card">
                            <img src="https://img.freepik.com/free-vector/health-logo-template-design_23-2150316492.jpg"
                                class="news-card-img" alt="Berita">
                            <div class="news-card-body">
                                <span class="news-card-date">30 Februari 2077</span>
                                <h5 class="news-card-title">Kunci Mata Sehat di Usia Lanjut</h5>
                                <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="news-card">
                            <img src="https://img.freepik.com/free-photo/scientist-using-microscope_23-2148847831.jpg"
                                class="news-card-img" alt="Berita">
                            <div class="news-card-body">
                                <span class="news-card-date">30 Februari 2077</span>
                                <h5 class="news-card-title">Solusi Tuntas Mata Kering</h5>
                                <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="news-card">
                            <img src="https://img.freepik.com/free-photo/modern-hospital-room_23-2148847819.jpg"
                                class="news-card-img" alt="Berita">
                            <div class="news-card-body">
                                <span class="news-card-date">30 Februari 2077</span>
                                <h5 class="news-card-title">Bahaya Kebutaan Karena Gadget</h5>
                                <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="news-card">
                            <img src="https://img.freepik.com/free-photo/senior-patient-hospital_23-2148962451.jpg"
                                class="news-card-img" alt="Berita">
                            <div class="news-card-body">
                                <span class="news-card-date">30 Februari 2077</span>
                                <h5 class="news-card-title">Cara Menggunakan BPJS Kesehatan</h5>
                                <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".news-next",
                prevEl: ".news-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
            },
        });
    </script>
@endsection
