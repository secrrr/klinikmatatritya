<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Page unknown') - Klinik Mata Tritya</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            /* --primary-navy: #1D2088; */
            --primary-navy: #19225f;
            --accent-blue: #3b82f6;
            --light-blue-bg: #dbeafe;
            --light-bg: #f8fafc;
            --text-dark: #1f2937;
            --accent-pink: #ec4899;
            --accent-pink-hover: #db2777;
            --card-blue-bg: #2e3b8f;
            --text-gray-1: #6d7179;
            --tritya-navy: #19225f;
            --tritya-blue: #2d4cc8;
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
            font-weight: 600;
        }

        .btn-janji {
            background-color: var(--light-blue-bg);
            color: #2563eb;
            font-weight: 600;
            border: none;
        }

        /* --- Footer (Reused) --- */
        .footer-wrapper {
            /* background-color transparent */
            background-color: transparent;
            position: relative;
            margin-top: -280px;
        }

        /* jika mode tablet margin top 590 */
        @media (max-width: 1024px) {
            .footer-wrapper {
                margin-top: -590px;
            }
        }

        .map-card {
            background-color: var(--primary-navy);
            color: white;
            border-radius: 0 15px 15px 0;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .map-iframe {
            border: 0;
            border-radius: 15px 0 0 15px;
            min-height: 350px;
        }

        @media (max-width: 990px) {
            .map-card {
                border-radius: 0 0 15px 15px;
            }

            .map-iframe {
                border-radius: 15px 15px 0 0;
            }
        }


        .main-footer {
            background-color: var(--primary-navy);
            color: white;
            padding-top: 140px;
            padding-bottom: 30px;
            margin-top: -80px;
            background-image: url('{{ asset('img/bg-footer.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
        }


        .overlay-ornament {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/img/ornament.png');
            background-size: contain;
            background-repeat: repeat;
            background-position: center;
            opacity: 0.8;
            pointer-events: none;
            z-index: 0;
        }



        .footer-link {
            color: #d1d5db;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }


        .footer-link:hover {
            color: white;
        }

        /* Floating Whatsapp */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            background-color: #128c7e;
            color: white;
        }

        .text-muted {
            color: var(--text-gray-1) !important;
        }
    </style>
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
            height: 400px;
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
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(59, 59, 59, 0.7));
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
            padding: 0;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        /* Typography dalam artikel */
        .article-text {
            padding: 60px;
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

            .article-text {
                padding: 30px;
            }
        }
    </style>


    @include('components.navbar')

    <!-- 1. Hero Section (Gambar & Judul Utama) -->
    <div class="news-detail-hero" style="background-image: url('{{ asset('img/bg-statis-page.png') }}');">
        <div class="news-hero-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="news-hero-content">
                        <!-- Judul Artikel -->
                        <h1 class="news-title-main">
                            @yield('title')
                        </h1>
                        <p class="mt-3 text-white">
                            @yield('deskripsi')
                        </p>
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
                        <img src="@yield('image')" class="img-fluid w-100" alt="@yield('title')">
                        <div class="article-text">
                            @yield('content')
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
                                <a href="{{ route('fe.news.detail', $recent->slug) }}" class="btn-full-width">Baca
                                    selengkapnya <i class="fas fa-chevron-right"></i></a>
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

    @include('components.footer')

    <!-- Floating Whatsapp -->
    <a href="https://wa.me/6282112110048" class="whatsapp-float" target="_blank"><i class="fab fa-whatsapp"></i></a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Adjust padding-bottom of the element before footer-wrapper to accommodate the negative margin footer
        document.addEventListener('DOMContentLoaded', function() {
            var footerWrapper = document.querySelector('.footer-wrapper');
            var target = footerWrapper ? footerWrapper.previousElementSibling : null;

            function adjustPadding() {
                if (!target) return;
                if (window.innerWidth <= 1024) {
                    target.style.paddingBottom = '650px';
                } else {
                    target.style.paddingBottom = '350px';
                }
            }

            // Run on load and resize
            adjustPadding();
            window.addEventListener('resize', adjustPadding);
        });
    </script>


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
    </body>

</html>
