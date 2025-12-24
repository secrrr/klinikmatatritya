@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Detail Dokter')

@section('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        :root {
            --primary-navy: #182366;
            --light-blue-bg: #dbeafe;
            --light-bg: #f8fafc;
            --text-dark: #333;
            --calendar-active: #182366;
            /* Warna tanggal aktif */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }

        /* --- Navbar --- */
        .navbar {
            background: white;
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

        /* --- Header Profile --- */
        .back-link {
            text-decoration: none;
            color: var(--primary-navy);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .doctor-img-detail {
            width: 100%;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .profile-list li {
            margin-bottom: 8px;
            line-height: 1.5;
            color: #444;
        }

        /* --- Content Cards --- */
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            border: none;
        }

        .section-title {
            font-weight: 700;
            color: #111;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        /* --- JADWAL SECTION (Custom Styling) --- */
        /* 1. Calendar Mini */
        .calendar-wrapper {
            padding: 10px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            text-align: center;
        }

        .calendar-day-name {
            font-size: 0.8rem;
            color: #888;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .calendar-date {
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 0.9rem;
            color: #555;
            cursor: default;
        }

        /* State untuk tanggal */
        .calendar-date.active {
            background-color: var(--calendar-active);
            color: white;
            font-weight: 600;
        }

        .calendar-date.has-schedule {
            border: 1px solid var(--calendar-active);
            color: var(--calendar-active);
        }

        .calendar-date.faded {
            color: #ccc;
        }

        /* 2. Schedule Table */
        .table-schedule thead th {
            background-color: #f1f5f9;
            color: var(--primary-navy);
            border: none;
            padding: 15px;
            text-align: center;
            font-weight: 600;
        }

        .table-schedule tbody td {
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #555;
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .table-schedule tbody tr:last-child td {
            border-bottom: none;
        }

        .btn-janji-small {
            background-color: var(--light-blue-bg);
            color: var(--primary-navy);
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        /* --- Slider News --- */
        .nav-arrows .btn-arrow {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #eee;
            color: var(--primary-navy);
            margin-left: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .news-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .news-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .news-body {
            padding: 20px;
        }

        .btn-full-width {
            background-color: var(--light-blue-bg);
            color: #2563eb;
            width: 100%;
            text-align: left;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
        }

        /* Footer & Float */
        .footer-wrapper {
            position: relative;
            margin-top: 50px;
        }

        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            z-index: 100;
            box-shadow: 2px 2px 3px #999;
        }

        @media (max-width: 768px) {
            .calendar-grid {
                gap: 2px;
            }

            .calendar-date {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection


@section('content')

    <div class="container py-5">
        <!-- Back Button -->
        <a href="#" class="back-link"><i class="fas fa-chevron-left me-2"></i> Kembali</a>

        <!-- Header Profile -->
        <div class="mb-5">
            <h1 class="fw-bold mb-1">dr. Heni Riyanto, Sp.M (K)</h1>
            <p class="text-muted fs-5 mb-4">Sub Spesialis/Konsultan Bidang Katarak dan Bedah Refraksi</p>

            <div class="row g-5">
                <!-- Image -->
                <div class="col-lg-4">
                    <img src="https://img.freepik.com/free-photo/portrait-smiling-handsome-male-doctor-man_171337-5055.jpg"
                        alt="dr. Heni Riyanto" class="doctor-img-detail">
                </div>
                <!-- Education & Training -->
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-3">Riwayat Pendidikan</h3>
                    <ul class="profile-list">
                        <li>Kedokteran Umum, FK, Universitas Airlangga</li>
                        <li>Kedokteran Spesialis, FK, Universitas Airlangga</li>
                        <li>Pasca Sarjana, FK, Universitas Airlangga</li>
                        <li>Konsultan Kolegium Oftalmologi Indonesia bidang kornea, lensa dan bedah refraktif Jakarta
                        </li>
                        <li>Sub Spesialis Mata Bedah Katarak & Bedah Refraktif</li>
                    </ul>

                    <h3 class="fw-bold mb-3 mt-4">Pendidikan/Pelatihan Khusus</h3>
                    <ul class="profile-list">
                        <li>Fellowship Phacoemulsification 2010, Ahmedabad, India</li>
                        <li>Hands-On Training Phakic & Aphakic IOL 2015, Jakarta</li>
                        <li>Surgical Skill Training Course: Intraocular & Transcleral Suturing 2017, Lisbon, Portugal
                        </li>
                        <li>Internal Training Course: Femto-Lasik (Visumax-MEL90) 2022, NEC-Carl Zeiss, Surabaya</li>
                        <li>Phakic IOL 2022, PMN Cicendo, Bandung</li>
                        <li>Surgical Skill Training Course: Anterior Vitrectomy 2022, ESCRS, Milan, Italy</li>
                        <li>SMILE Course 2024 di SNEC, Singapore</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section: Kompetensi -->
        <div class="content-card">
            <h3 class="section-title">Kompetensi dan Keahlian Bidang</h3>
            <p style="line-height: 1.8; color: #555;">
                dr. Heni Riyanto, Sp.M(K) adalah dokter spesialis mata dengan subspesialisasi di bidang bedah katarak
                dan bedah refraktif. Beliau memiliki kompetensi tinggi dalam prosedur seperti Phacoemulsification,
                LASIK, SMILE, dan pemasangan lensa tanam (IOL), serta aktif mengikuti pelatihan internasional di India,
                Austria, Portugal, Hong Kong, dan Singapura.
            </p>
        </div>

        <!-- Section: Penelitian -->
        <div class="content-card">
            <h3 class="section-title">Penelitian dan Publikasi</h3>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <strong>2023, Penulis,</strong> Comparative analysis of urothelial regeneration post-endoscopic
                    intervention in chronic obstructive uropathy: a multicenter study in Southeast Asia, doi:
                    https://doi.org/10.12688/f1000research.139876.1
                </li>
                <li class="mb-3">
                    <strong>2023, Penulis,</strong> Comparative analysis of urothelial regeneration post-endoscopic
                    intervention in chronic obstructive uropathy: a multicenter study in Southeast Asia.
                </li>
            </ul>
        </div>

        <!-- Section: JADWAL DOKTER (Dynamic Ready) -->
        <div class="content-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title mb-0">Jadwal Dokter</h3>
                <button class="btn-janji-small">Buat Janji <i class="fas fa-chevron-right ms-2"></i></button>
            </div>

            <div class="row">
                <!-- 1. Calendar View (Left) -->
                <div class="col-lg-4 border-end">
                    <div class="calendar-wrapper">
                        <!-- Header Calendar -->
                        <div class="calendar-header">
                            <span>January 2025</span>
                            <div>
                                <i class="fas fa-chevron-left me-3 cursor-pointer"></i>
                                <i class="fas fa-chevron-right cursor-pointer"></i>
                            </div>
                        </div>

                        <!-- Days Header -->
                        <div class="calendar-grid">
                            <div class="calendar-day-name">Su</div>
                            <div class="calendar-day-name">Mo</div>
                            <div class="calendar-day-name">Tu</div>
                            <div class="calendar-day-name">We</div>
                            <div class="calendar-day-name">Th</div>
                            <div class="calendar-day-name">Fr</div>
                            <div class="calendar-day-name">Sa</div>
                        </div>

                        <!-- Dates Grid (Dynamic Logic Idea) -->
                        <!-- Logic Backend: Loop tgl 1-31. Cek jika hari ini ada jadwal, beri class 'active' atau 'has-schedule' -->
                        <div class="calendar-grid mt-2">
                            <div class="calendar-date faded">30</div>
                            <div class="calendar-date faded">31</div>
                            <div class="calendar-date">1</div>
                            <div class="calendar-date">2</div>
                            <div class="calendar-date">3</div>
                            <div class="calendar-date">4</div>
                            <div class="calendar-date">5</div>

                            <!-- Contoh Tanggal Aktif (Praktek) -->
                            <div class="calendar-date active">6</div>
                            <div class="calendar-date active">7</div>
                            <div class="calendar-date active">8</div>
                            <div class="calendar-date active">9</div>
                            <div class="calendar-date active">10</div>
                            <div class="calendar-date active">11</div>
                            <div class="calendar-date">12</div>

                            <div class="calendar-date active">13</div>
                            <div class="calendar-date active">14</div>
                            <div class="calendar-date">15</div>
                            <div class="calendar-date active">16</div>
                            <div class="calendar-date active">17</div>
                            <div class="calendar-date active">18</div>
                            <div class="calendar-date">19</div>

                            <div class="calendar-date active">20</div>
                            <div class="calendar-date active">21</div>
                            <div class="calendar-date">22</div>
                            <div class="calendar-date active">23</div>
                            <div class="calendar-date active">24</div>
                            <div class="calendar-date active">25</div>
                            <div class="calendar-date">26</div>

                            <div class="calendar-date">27</div>
                            <div class="calendar-date">28</div>
                            <div class="calendar-date">29</div>
                            <div class="calendar-date">30</div>
                            <div class="calendar-date">31</div>
                        </div>
                    </div>
                </div>

                <!-- 2. Weekly Schedule Table (Right) -->
                <!-- Struktur Tabel ini mudah di-looping di Laravel -->
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table-schedule table-hover table">
                            <thead>
                                <tr>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Minggu & Holiday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Baris Shift 1 -->
                                <tr>
                                    <!-- Logic Backend: foreach ($days as $day) -->
                                    <td>08.00–11.00 WIB</td>
                                    <td>08.00–11.00 WIB</td>
                                    <td>08.00–11.00 WIB</td>
                                    <td>08.00–11.00 WIB</td>
                                    <td>08.00–11.00 WIB</td>
                                    <td>08.00–11.00 WIB</td>
                                </tr>
                                <!-- Baris Shift 2 (Jika Ada) -->
                                <tr>
                                    <td>13.00–15.00 WIB</td> <!-- Contoh data kosong bisa dihandle backend -->
                                    <td>-</td>
                                    <td>13.00–15.00 WIB</td>
                                    <td>-</td>
                                    <td>13.00–15.00 WIB</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Postingan Terbaru (Slider) -->
        <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
            <h2 class="fw-bold">Postingan Terbaru</h2>
            <div class="nav-arrows">
                <button class="btn-arrow news-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="btn-arrow news-next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="swiper newsSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="https://img.freepik.com/free-photo/modern-hospital-room_23-2148847819.jpg" alt="News">
                        <div class="news-body">
                            <small class="text-muted d-block mb-2">30 Februari 2077</small>
                            <h5 class="fw-bold mb-3">Jangan Remehkan! 5 Tanda Gangguan</h5>
                            <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Duplicate slides for demo -->
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="https://img.freepik.com/free-vector/health-logo-template-design_23-2150316492.jpg"
                            alt="News">
                        <div class="news-body">
                            <small class="text-muted d-block mb-2">30 Februari 2077</small>
                            <h5 class="fw-bold mb-3">Kunci Mata Sehat di Usia Lanjut</h5>
                            <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="https://img.freepik.com/free-photo/scientist-using-microscope_23-2148847831.jpg"
                            alt="News">
                        <div class="news-body">
                            <small class="text-muted d-block mb-2">30 Februari 2077</small>
                            <h5 class="fw-bold mb-3">Solusi Tuntas Mata Kering</h5>
                            <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="news-card">
                        <img src="https://img.freepik.com/free-photo/modern-hospital-room_23-2148847819.jpg"
                            alt="News">
                        <div class="news-body">
                            <small class="text-muted d-block mb-2">30 Februari 2077</small>
                            <h5 class="fw-bold mb-3">Jangan Remehkan! 5 Tanda Gangguan</h5>
                            <a href="/new" class="btn-full-width">Baca selengkapnya <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".newsSwiper", {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
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
