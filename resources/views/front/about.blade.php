@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Tentang Kami')

@section('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        :root {
            --primary-navy: #182366;
            --accent-pink: #e91e63;
            /* Warna pink grafik */
            --text-gray: #6c757d;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* --- Hero Section --- */
        .hero-section {
            position: relative;
            background-image: url('https://img.freepik.com/free-photo/hospital-building-modern-parking-lot_1127-3247.jpg');
            /* Placeholder image */
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 50px;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(360deg, #F8FAFC 0%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .about-main-card {
            position: relative;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            z-index: 2;
            margin-top: -100px;
            /* Pull up effect */
        }

        /* --- Visi Misi --- */
        .vm-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            height: 100%;
            border-left: 4px solid transparent;
            transition: 0.3s;
        }

        .vm-card:hover {
            transform: translateY(-5px);
        }

        .vm-title {
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* --- Values (Nilai Kami) --- */
        .value-number {
            font-size: 3rem;
            font-weight: 700;
            color: #dee2e6;
            line-height: 1;
        }

        .value-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: #212529;
        }

        .values-divider {
            height: 2px;
            background-color: #e9ecef;
            width: 100%;
            margin-bottom: 30px;
            position: relative;
        }

        /* Dots on divider */
        .values-container {
            position: relative;
        }

        /* --- Layanan Tabs --- */
        .nav-pills .nav-link {
            background-color: #f1f3f5;
            color: #495057;
            margin: 0 5px;
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
        }

        .nav-pills .nav-link.active {
            background-color: #e2e6ea;
            color: var(--primary-navy);
            font-weight: 700;
        }

        /* --- Charts --- */
        .chart-container {
            background: #f8fbff;
            border-radius: 15px;
            padding: 20px;
            height: 350px;
        }

        /* --- Education/Training Slider --- */
        .edu-slide-content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .edu-image-wrapper {
            position: relative;
            flex: 1;
        }

        .edu-img {
            width: 100%;
            border-radius: 15px;
            height: 400px;
            object-fit: cover;
        }

        .edu-overlay-text {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .edu-text-side {
            flex: 0.5;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .edu-slide-content {
                flex-direction: column;
            }

            .about-main-card {
                margin-top: -50px;
            }
        }

        /* --- Timeline (Perkembangan) --- */
        .timeline-section {
            background-color: #F3F9FF;
            padding: 80px 0;
            overflow: hidden;

        }

        .timeline-year {
            font-size: 5rem;
            font-weight: 800;
            color: white;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
            line-height: 1;
            opacity: 0.8;
        }

        .timeline-content {
            position: relative;
            z-index: 2;
            padding-top: 20px;
        }

        .timeline-line {
            position: absolute;
            top: 150px;
            /* Adjust based on year height */
            left: 0;
            width: 100%;
            height: 2px;
            background: #cbd5e1;
            z-index: 1;
        }

        .timeline-dot {
            width: 15px;
            height: 15px;
            background: var(--primary-navy);
            border-radius: 50%;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        /* --- Swiper Custom Buttons --- */
        .custom-nav-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-navy);
            cursor: pointer;
            transition: 0.3s;
        }

        .custom-nav-btn:hover {
            background: var(--primary-navy);
            color: white;
        }

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

        .text-muted {
            color: var(--text-gray) !important;
        }

        /* Timeline Horizontal Scroll */
        .timeline-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            width: 100%;
            padding: 20px 0;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .timeline-scroll-container::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .timeline-image-wrapper {

            width: max-content;
            min-width: 100%;
        }

        .timeline-image-wrapper img {
            height: 500px;
            width: auto;
            max-width: none;
            display: block;
        }
    </style>
@endsection

@section('content')

    <!-- 1. Hero & About Text -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container" style="position: relative; z-index: 3;">
            <h1 class="fw-bold display-4 text-dark mb-5">About US</h1>
        </div>
    </div>

    <div class="container mb-5">
        <div class="about-main-card">
            <p class="mb-0" style="line-height: 1.8;">
                Klinik Mata Tritya (KMT) merupakan salah satu pelopor berdirinya klinik khusus mata. Berdiri sejak 04
                Februari 2009.
                Klinik Mata Tritya didedikasikan oleh dr. Armanto Sidohutomo, Sp.M agar menjadi manfaat sesama bagi
                masyarakat.
                Sesuai dengan visi Klinik Mata Tritya "layanan paripurna sehat mata manfaat sesama" (rahmatan lil 'alamin)
                dan didukung oleh para dokter spesialis mata yang kompeten dibidangnya.
                Klinik Mata Tritya fokus melayani kesehatan mata untuk seluruh bagian lapisan masyarakat yang membutuhkan.
                Pemberantasan kebutaan mata di Indonesia melalui pelayanan operasi katarak baik menggunakan JKN, organisasi
                sosial, dan Corporate Social Responsibility (CSR).
                Klinik untuk pasien yang tidak mampu merupakan salah satu misi Klinik Mata Tritya.
            </p>
        </div>
    </div>

    <!-- 2. Visi Misi Motto -->
    <div class="container mb-5">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-3 d-flex align-items-center">
                <h2 class="fw-bold display-6">Visi, Misi,<br>dan Motto</h2>
            </div>
            <div class="col-lg-3">
                <div class="vm-card">
                    <div class="vm-title">Visi</div>
                    <p class="small text-muted mb-0">Layanan paripurna, sehat mata dan manfaat sesama.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="vm-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="vm-title mb-0">Misi</div>
                    </div>
                    <p class="small text-muted mb-0">Menyediakan fasilitas dan pelayanan kesehatan mata paripurna dengan
                        mengedepankan kepuasan pelanggan.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="vm-card">
                    <div class="vm-title">Motto</div>
                    <p class="small text-muted mb-0">Mari Melihat Kembali</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Nilai-Nilai Kami -->
    <div class="container py-5">
        <h2 class="fw-bold mb-5 text-center">Nilai-Nilai Kami</h2>

        <div class="values-divider d-none d-lg-block"></div>

        <div class="row g-4 text-center">
            <!-- 01 -->
            <div class="col-lg">
                <div class="value-number">01</div>
                <h6 class="value-title mt-3">Tahu Diri</h6>
                <p class="small text-muted">Memiliki inisiatif, inspiratif, inovatif, sopan, beradab dan berakhlak mulia.
                </p>
            </div>
            <!-- 02 -->
            <div class="col-lg">
                <div class="value-number">02</div>
                <h6 class="value-title mt-3">Tetap Semangat</h6>
                <p class="small text-muted">Tidak akan pernah putus asa dan pantang menyerah demi manfaat sesama.</p>
            </div>
            <!-- 03 -->
            <div class="col-lg">
                <div class="value-number">03</div>
                <h6 class="value-title mt-3">Ikhlas</h6>
                <p class="small text-muted">Mendahulukan kepentingan sesama, institusi dan alam sekitar tanpa mengharapkan
                    imbalan.</p>
            </div>
            <!-- 04 -->
            <div class="col-lg">
                <div class="value-number">04</div>
                <h6 class="value-title mt-3">Atur Strategi</h6>
                <p class="small text-muted">Mengetahui dan memahami kekuatan, kelemahan, peluang dan tantangan diri sendiri.
                </p>
            </div>
            <!-- 05 -->
            <div class="col-lg">
                <div class="value-number">05</div>
                <h6 class="value-title mt-3">Punya Malu</h6>
                <p class="small text-muted">Selalu berhati-hati dalam bertindak, berani mengakui kesalahan secara ksatria,
                    meminta maaf, memperbaiki kesalahan.</p>
            </div>
        </div>
    </div>

    <!-- 4. Layanan Pasien -->
    <div class="container py-5 text-center">
        <h2 class="fw-bold mb-4">Layanan Pasien</h2>
        <div class="d-flex justify-content-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-umum-tab" type="button">Umum</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-asuransi-tab" type="button">Asuransi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-jkn-tab" type="button">JKN - BPJS Kesehatan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-gratis-tab" type="button">Pasien tidak berbayar
                        (GRATIS)</button>
                </li>
            </ul>
        </div>
        <!-- Tab Content (Placeholder) -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-umum" role="tabpanel"></div>
            <div class="tab-pane fade" id="pills-asuransi" role="tabpanel"></div>
            <!-- Content can be added here -->
        </div>
    </div>

    <!-- 5. Grafik Kompetensi & Pendidikan -->
    <div class="container py-5" style="background-color: #f8fbff; border-radius: 20px;">
        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <h4 class="fw-bold mb-4 text-center">Kompetensi</h4>
                <div class="chart-container">
                    <canvas id="kompetensiChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fw-bold mb-4 text-center">Jenjang Pendidikan</h4>
                <div class="chart-container">
                    <canvas id="pendidikanChart"></canvas>
                </div>
            </div>
        </div>
    </div>



    <!-- 7. Perkembangan (Timeline) -->
    <div class="timeline-section" style="position: relative">
        <div class="overlay-ornament"></div>
        <!-- 6. Pendidikan & Pelatihan Slider -->
        <div class="container py-5">
            <div class="d-flex justify-content-end mb-3 gap-2">
                <!-- Custom Navigation for this slider -->
                <div class="custom-nav-btn edu-prev"><i class="fas fa-chevron-left"></i></div>
                <div class="custom-nav-btn edu-next"><i class="fas fa-chevron-right"></i></div>
            </div>

            <div class="swiper eduSwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="edu-slide-content">
                            <div class="edu-image-wrapper">
                                <img src="https://img.freepik.com/free-photo/doctors-discussing-patient-s-report_107420-84784.jpg"
                                    class="edu-img" alt="Pelatihan">
                                <div class="edu-overlay-text">
                                    <p class="fw-bold text-dark mb-0">Sebagai tempat Pelatihan dan Magang Perawat,
                                        Optometri,
                                        Rekam Medis dan Nakes Lain</p>
                                </div>
                            </div>
                            <div class="edu-text-side">
                                <h2 class="fw-bold mb-4">Pendidikan,<br>Pelatihan, dan<br>Penelitian</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 (Duplicate for demo) -->
                    <div class="swiper-slide">
                        <div class="edu-slide-content">
                            <div class="edu-image-wrapper">
                                <img src="https://img.freepik.com/free-photo/ophthalmologist-checking-patient-eyes_23-2148847833.jpg"
                                    class="edu-img" alt="Penelitian">
                                <div class="edu-overlay-text">
                                    <p class="fw-bold text-dark mb-0">Pengembangan skill dokter dan tenaga medis melalui
                                        seminar internal</p>
                                </div>
                            </div>
                            <div class="edu-text-side">
                                <h2 class="fw-bold mb-4">Pendidikan,<br>Pelatihan, dan<br>Penelitian</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-4">
                    <h2 class="fw-bold display-5">Perkembangan<br>Klinik Mata<br>Tritya</h2>
                    <div class="d-flex my-4 gap-2">
                        <div class="custom-nav-btn timeline-prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="custom-nav-btn timeline-next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
                <div class="col-lg-8" style="background-color: #E4F1FF;">
                    <div class="timeline-scroll-container">
                        <div class="timeline-image-wrapper">
                            <img src="{{ asset('img/about/history.png') }}"
                                alt="Timeline Perkembangan Klinik Mata Tritya">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 8. Postingan Terbaru (Reused Component) -->
        <div class="container py-5">
            <div class="section-header d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Postingan Terbaru</h2>
                <div class="nav-arrows">
                    <button class="btn-arrow news-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn-arrow news-next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="swiper newsSwiper">
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
    </div>


@endsection

@section('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // --- 1. Init Chart.js (Grafik) ---

        // Chart Kompetensi
        const ctx1 = document.getElementById('kompetensiChart');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartKompetensi['labels']) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($chartKompetensi['data']) !!},
                    backgroundColor: '#e91e63',
                    borderRadius: 5,
                    barThickness: 30
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Chart Pendidikan
        const ctx2 = document.getElementById('pendidikanChart');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartPendidikan['labels']) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($chartPendidikan['data']) !!},
                    backgroundColor: '#e91e63',
                    borderRadius: 5,
                    barThickness: 35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // --- 2. Init Swipers ---

        // Education Slider
        new Swiper('.eduSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.edu-next',
                prevEl: '.edu-prev',
            },
        });

        // Timeline - Custom scroll navigation with buttons
        const timelineContainer = document.querySelector('.timeline-scroll-container');
        const timelinePrev = document.querySelector('.timeline-prev');
        const timelineNext = document.querySelector('.timeline-next');

        if (timelineContainer && timelinePrev && timelineNext) {
            const scrollAmount = 400; // Jarak scroll per klik

            timelineNext.addEventListener('click', function() {
                timelineContainer.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });

            timelinePrev.addEventListener('click', function() {
                timelineContainer.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });
        }

        // News Slider
        new Swiper('.newsSwiper', {
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
