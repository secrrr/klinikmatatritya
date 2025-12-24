@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Jangan Remehkan! 5 Tanda Gangguan Penglihatan')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        /* --- Scoped Styles for Detail Berita --- */


        /* 1. Hero Section Style */
        .news-detail-hero {
            position: relative;
            /* Gambar background mata/medis */
            background-image: url('https://img.freepik.com/free-photo/close-up-optometrist-checking-patient-s-vision_23-2148847828.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            /* Tinggi hero */
            display: flex;
            align-items: center;
            padding-bottom: 80px;
            /* Memberi ruang agar teks agak ke atas */
        }

        /* Overlay gelap agar teks putih terbaca */
        .news-hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));
            z-index: 1;
        }

        .news-hero-content {
            position: relative;
            z-index: 2;
            color: white;
            padding-top: 60px;
        }

        .news-title-main {
            font-weight: 700;
            font-size: 2.5rem;
            line-height: 1.3;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* 2. Content Card Style (Efek Kertas Menumpuk) */
        .news-content-wrapper {
            position: relative;
            z-index: 10;
            margin-top: -120px;
            /* KUNCI DESAIN: Menarik konten ke atas menutupi hero */
            padding-bottom: 80px;
        }

        .news-paper-card {
            background: white;
            border-radius: 20px;
            padding: 60px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        /* Typography dalam artikel */
        .article-text {
            color: #444;
            line-height: 1.8;
            font-size: 1rem;
        }

        .article-text h3,
        .article-text h4 {
            color: #111;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .article-text p {
            margin-bottom: 20px;
        }

        .article-text ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .article-text li {
            margin-bottom: 8px;
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

        /* Responsiveness */
        @media (max-width: 768px) {
            .news-detail-hero {
                height: 400px;
            }

            .news-title-main {
                font-size: 1.8rem;
            }

            .news-content-wrapper {
                margin-top: -80px;
            }

            .news-paper-card {
                padding: 30px;
            }
        }
    </style>
@endsection

@section('content')

    <!-- 1. Hero Section (Gambar & Judul Utama) -->
    <div class="news-detail-hero" style="background-image: url('{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/1200x600' }}');">
        <div class="news-hero-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="news-hero-content">
                        <!-- Judul Artikel -->
                        <h1 class="news-title-main">
                            {{ $article->title }}
                        </h1>
                        <p class="mt-3 text-white-50"><i class="far fa-calendar-alt me-2"></i> {{ $article->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Content Section (Overlapping Card) -->
    <div class="news-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="news-paper-card">
                        <div class="article-text">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Section: Postingan Terbaru -->
    <div class="container pt-4">
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
                @forelse($recent_articles as $recent)
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="{{ $recent->image ? asset('storage/' . $recent->image) : 'https://via.placeholder.com/600x400' }}"
                            class="news-card-img" alt="{{ $recent->title }}">
                        <div class="news-card-body">
                            <span class="news-card-date">{{ $recent->created_at->format('d F Y') }}</span>
                            <h5 class="news-card-title">{{ Str::limit($recent->title, 40) }}</h5>
                            <a href="{{ route('fe.news.detail', $recent->slug) }}" class="btn-full-width">Baca selengkapnya <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="swiper-slide">
                    <div class="p-4 text-center">Belum ada postingan terbaru.</div>
                </div>
                @endforelse
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
