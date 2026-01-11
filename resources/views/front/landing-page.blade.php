@extends('layouts.app')

@section('title', 'Klinik Mata Tritya - Beranda')
@php
    $hero = \App\Models\Hero::where('is_active', 1)->first();
@endphp
@section('styles')

@endsection

@section('content')

    @if ($popup && $popup->image)
        <div id="popupOverlay" class="popup-overlay">
            <div class="popup-box">

                <div class="popup-close" id="closePopup">×</div>

                <img src="{{ asset('storage/' . $popup->image) }}" class="popup-image" alt="Popup Info">
            </div>
        </div>
    @endif


    <!-- 1. HERO SECTION -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="hero-title">{!! nl2br(e($hero->title)) !!}</h1>
                    <p class="hero-desc">
                        {{ $hero->description }}
                    </p>
                    <a href="{{ $hero->button_link }}" class="btn-navy">{{ $hero->button_text }}</a>
                </div>
            </div>
        </div>
    </section>

    <div style=" padding-bottom: 80px;" id="detail-page">
        <div class="container" style="max-width:1000px;">
            <div class="search-box-wrapper">
                <div class="search-box">
                    <div class="mb-4 text-center">
                        <h4 class="search-title">Biarkan Kami Membantu Anda</h4>
                        <p class="text-muted small">Cukup beritahu kami siapa dan apa kebutuhan anda.</p>
                    </div>

                    <form onsubmit="return false;">
                        <div class="row g-3 align-items-end justify-content-center">
                            <div class="col-md-auto d-flex align-items-center mb-2">
                                <span class="fw-semibold me-2">Saya seorang</span>
                            </div>

                            <div class="col-md-3">
                                <select class="form-select form-select-custom" id="roleSelect">
                                    <option value="pasien" selected>Pasien</option>
                                    <option value="keluarga pasien">Keluarga Pasien</option>
                                </select>
                            </div>

                            <div class="col-md-auto d-flex align-items-center mb-2">
                                <span class="fw-semibold mx-2">sedang mencari</span>
                            </div>

                            <div class="col-md-3">
                                <select class="form-select form-select-custom" id="searchSelect">
                                    <option value="Dokter" selected>Dokter</option>
                                    <option value="Layanan">Layanan</option>
                                    <option value="Jadwal">Jadwal</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn-search-blue" onclick="redirectToWhatsapp()">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- 3. SPESIALISASI KAMI -->
        <section style="padding-bottom: 80px; ">
            <div class="container">
                <div class="row align-items-start">
                    <!-- Info Box Kiri (Dinamis berdasarkan kartu aktif) -->
                    <div class="col-lg-5 mb-lg-0 mb-4">
                        <div id="specInfoBox">
                            <h2 class="section-title">Spesialisasi Kami</h2>
                            <p class="text-muted pe-lg-4 mb-4" id="specDefaultDesc">
                                Solusi kesehatan mata terpercaya untuk Anda dan keluarga, dari pemeriksaan rutin hingga
                                penanganan
                                gangguan penglihatan
                            </p>
                        </div>
                        <!-- Navigasi -->
                        <div class="d-flex mt-4 gap-3">
                            <button class="nav-circle-btn spec-prev"><i class="fas fa-chevron-left"></i></button>
                            <button class="nav-circle-btn spec-next"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>

                    <!-- Slider Kanan -->
                    <div class="col-lg-7">
                        <div class="swiper specSwiper" style="padding-bottom: 20px;">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="EMC"
                                        data-desc="pemeriksaan menyeluruh oleh dokter mata untuk mendeteksi gangguan
                                                penglihatan seperti minus, plus, silinder, serta penyakit mata serius
                                                seperti glaukoma, katarak, dan retinopati. Pemeriksaan ini penting dilakukan
                                                secara rutin, terutama bagi anak-anak, pengguna kacamata, lansia, serta
                                                penderita diabetes atau hipertensi, guna menjaga kesehatan mata dan mencegah
                                                kerusakan lebih lanjut.">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="far fa-eye"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">EMC</h4>
                                            <p class="spec-desc">
                                                pemeriksaan menyeluruh oleh dokter mata untuk mendeteksi gangguan
                                                penglihatan seperti minus, plus, silinder, serta penyakit mata serius
                                                seperti glaukoma, katarak, dan retinopati. Pemeriksaan ini penting dilakukan
                                                secara rutin, terutama bagi anak-anak, pengguna kacamata, lansia, serta
                                                penderita diabetes atau hipertensi, guna menjaga kesehatan mata dan mencegah
                                                kerusakan lebih lanjut.
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="Cataract Surgery"
                                        data-desc="Operasi Katarak adalah prosedur medis untuk mengangkat lensa mata yang keruh akibat katarak dan menggantinya dengan lensa buatan (intraocular lens/IOL), sehingga penglihatan menjadi jernih kembali. Prosedur ini aman, cepat, dan efektif, serta umumnya dilakukan tanpa perlu rawat inap. Operasi katarak disarankan saat gangguan penglihatan mulai menghambat aktivitas harian seperti membaca, menyetir, atau melihat dengan jelas.">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="fas fa-glasses"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">Cataract Surgery</h4>
                                            <p class="spec-desc">Operasi Katarak adalah prosedur medis untuk mengangkat
                                                lensa mata yang keruh akibat katarak dan menggantinya dengan lensa buatan
                                                (intraocular lens/IOL), sehingga penglihatan menjadi jernih kembali.
                                                Prosedur ini aman, cepat, dan efektif, serta umumnya dilakukan tanpa perlu
                                                rawat inap. Operasi katarak disarankan saat gangguan penglihatan mulai
                                                menghambat aktivitas harian seperti membaca, menyetir, atau melihat dengan
                                                jelas.</p>
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="Optical Refraction"
                                        data-desc="
                                    Refrakssi Optisi (RO) adalah layanan pemeriksaan mata oleh Refraksionis Optisien, profesional yang berwenang menentukan resep kacamata atau lensa kontak sesuai kebutuhan visual Anda. Pemeriksaan ini membantu mendeteksi gangguan refraksi seperti rabun jauh, rabun dekat, dan silinder, serta memberikan saran perawatan mata untuk menjaga kenyamanan dan kualitas penglihatan sehari-hari.
                                    ">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="fas fa-low-vision"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">Optical Refraction</h4>
                                            <p class="spec-desc">Refrakssi Optisi (RO) adalah layanan pemeriksaan mata oleh
                                                Refraksionis Optisien, profesional yang berwenang menentukan resep kacamata
                                                atau lensa kontak sesuai kebutuhan visual Anda. Pemeriksaan ini membantu
                                                mendeteksi gangguan refraksi seperti rabun jauh, rabun dekat, dan silinder,
                                                serta memberikan saran perawatan mata untuk menjaga kenyamanan dan kualitas
                                                penglihatan sehari-hari.</p>
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="EMC"
                                        data-desc="pemeriksaan menyeluruh oleh dokter mata untuk mendeteksi gangguan
                                                penglihatan seperti minus, plus, silinder, serta penyakit mata serius
                                                seperti glaukoma, katarak, dan retinopati. Pemeriksaan ini penting dilakukan
                                                secara rutin, terutama bagi anak-anak, pengguna kacamata, lansia, serta
                                                penderita diabetes atau hipertensi, guna menjaga kesehatan mata dan mencegah
                                                kerusakan lebih lanjut.">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="far fa-eye"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">EMC</h4>
                                            <p class="spec-desc">
                                                pemeriksaan menyeluruh oleh dokter mata untuk mendeteksi gangguan
                                                penglihatan seperti minus, plus, silinder, serta penyakit mata serius
                                                seperti glaukoma, katarak, dan retinopati. Pemeriksaan ini penting dilakukan
                                                secara rutin, terutama bagi anak-anak, pengguna kacamata, lansia, serta
                                                penderita diabetes atau hipertensi, guna menjaga kesehatan mata dan mencegah
                                                kerusakan lebih lanjut.
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="Cataract Surgery"
                                        data-desc="Operasi Katarak adalah prosedur medis untuk mengangkat lensa mata yang keruh akibat katarak dan menggantinya dengan lensa buatan (intraocular lens/IOL), sehingga penglihatan menjadi jernih kembali. Prosedur ini aman, cepat, dan efektif, serta umumnya dilakukan tanpa perlu rawat inap. Operasi katarak disarankan saat gangguan penglihatan mulai menghambat aktivitas harian seperti membaca, menyetir, atau melihat dengan jelas.">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="fas fa-glasses"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">Cataract Surgery</h4>
                                            <p class="spec-desc">Operasi Katarak adalah prosedur medis untuk mengangkat
                                                lensa mata yang keruh akibat katarak dan menggantinya dengan lensa buatan
                                                (intraocular lens/IOL), sehingga penglihatan menjadi jernih kembali.
                                                Prosedur ini aman, cepat, dan efektif, serta umumnya dilakukan tanpa perlu
                                                rawat inap. Operasi katarak disarankan saat gangguan penglihatan mulai
                                                menghambat aktivitas harian seperti membaca, menyetir, atau melihat dengan
                                                jelas.</p>
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-slide">

                                    <div class="specialist-card" data-title="Optical Refraction"
                                        data-desc="
                                    Refrakssi Optisi (RO) adalah layanan pemeriksaan mata oleh Refraksionis Optisien, profesional yang berwenang menentukan resep kacamata atau lensa kontak sesuai kebutuhan visual Anda. Pemeriksaan ini membantu mendeteksi gangguan refraksi seperti rabun jauh, rabun dekat, dan silinder, serta memberikan saran perawatan mata untuk menjaga kenyamanan dan kualitas penglihatan sehari-hari.
                                    ">
                                        <!-- Icon -->
                                        <div class="spec-icon">
                                            <i class="fas fa-low-vision"></i>
                                        </div>

                                        <div class="mt-auto">
                                            <h4 class="spec-name">Optical Refraction</h4>
                                            <p class="spec-desc">Refrakssi Optisi (RO) adalah layanan pemeriksaan mata oleh
                                                Refraksionis Optisien, profesional yang berwenang menentukan resep kacamata
                                                atau lensa kontak sesuai kebutuhan visual Anda. Pemeriksaan ini membantu
                                                mendeteksi gangguan refraksi seperti rabun jauh, rabun dekat, dan silinder,
                                                serta memberikan saran perawatan mata untuk menjaga kenyamanan dan kualitas
                                                penglihatan sehari-hari.</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. PERALATAN MEDIS KAMI -->
        <section style="padding: 80px 0;">
            <div class="container">
                <div class="row align-items-end mb-5">
                    <div class="col-lg-7">
                        <h2 class="section-title mb-0">Peralatan Medis Kami</h2>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <p class="text-muted mb-0">
                            Klinik Mata Tritya menggunakan teknologi medis terkini untuk mendukung diagnosis dan perawatan
                            gangguan penglihatan secara akurat dan efisien
                        </p>
                    </div>
                </div>

                <div class="swiper equipSwiper">
                    <div class="swiper-wrapper">
                        <!-- Card 1 -->
                        <div class="swiper-slide">
                            <div class="equip-card">
                                <div class="equip-img-wrapper">
                                    <img src="{{ asset('img/statis/ark.png') }}" class="equip-img" alt="ARK">
                                </div>
                                <div class="equip-body">
                                    <h5 class="equip-title">Auto Refractometer Keratometer (ARK)</h5>
                                    <a href="/ark" class="btn-selengkapnya-navy">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div class="equip-card">
                                <div class="equip-img-wrapper">
                                    <img src="{{ asset('img/statis/nct.png') }}" class="equip-img" alt="NCT">
                                </div>
                                <div class="equip-body">
                                    <h5 class="equip-title">Non-Contact Tonometry (NCT)</h5>
                                    <a href="/nct" class="btn-selengkapnya-navy">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div class="equip-card">
                                <div class="equip-img-wrapper">
                                    <img src="{{ asset('img/statis/slit-lamp.png') }}" class="equip-img" alt="Slit Lamp">
                                </div>
                                <div class="equip-body">
                                    <h5 class="equip-title">Slit Lamp</h5>
                                    <a href="/slit-lamp" class="btn-selengkapnya-navy">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div class="equip-card">
                                <div class="equip-img-wrapper">
                                    <img src="{{ asset('img/statis/oct.png') }}" class="equip-img" alt="OCT">
                                </div>
                                <div class="equip-body">
                                    <h5 class="equip-title">Optical Coherence Tomography (OCT)</h5>
                                    <a href="/oct" class="btn-selengkapnya-navy">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <!--  <button class="nav-circle-btn equip-prev bg-white shadow-sm" style="width:40px;height:40px;"><i
                                        class="fas fa-chevron-left"></i></button>
                                <button class="nav-circle-btn equip-next bg-white shadow-sm" style="width:40px;height:40px;"><i
                                        class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="mid-container">
        <div class="mid-wrapper">
            <!-- 5. PROMO -->
            <section class="promo-section container text-center">
                <div class="">
                    <h2 class="section-title mb-3">Promo</h2>
                    <p class="text-muted mx-auto mb-5" style="max-width: 700px;">
                        Temukan penawaran menarik untuk layanan pemeriksaan, perawatan, dan produk kesehatan mata yang
                        dirancang
                        khusus untuk kebutuhan Anda
                    </p>

                    <div class="position-relative px-4">
                        <div class="swiper promoSwiper">
                            <div class="swiper-wrapper">
                                @forelse($promos as $promo)
                                    <div class="swiper-slide">
                                        <div class="promo-card text-start">
                                            <img src="{{ asset('storage/' . $promo->image) }}" class="promo-img"
                                                alt="{{ $promo->title }}">
                                            <h5 class="fw-bold mb-2">{{ $promo->title }}</h5>
                                            <div class="promo-price-tag">
                                                @if ($promo->price)
                                                    Rp {{ number_format($promo->price, 0, ',', '.') }}
                                                @else
                                                    Gratis / TBD
                                                @endif
                                            </div>
                                            <a href="{{ route('fe.detail-promo', $promo->slug) }}" class="btn-promo">
                                                Ambil Sekarang <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted">Belum ada promo saat ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <button
                            class="nav-circle-btn promo-prev position-absolute top-50 translate-middle-y start-0 z-10 shadow"
                            style="z-index: 10; left: -10px !important;"><i class="fas fa-chevron-left"></i></button>
                        <button
                            class="nav-circle-btn promo-next position-absolute top-50 translate-middle-y end-0 z-10 shadow"
                            style="z-index: 10; right: -10px !important;"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </section>

            <!-- 6. BERITA -->
            <section style="padding: 80px 0;">
                <div class="container">
                    <div class="row mb-5" style="color:white !important;">
                        <div class="col-md-3">
                            <h2 class="section-title" style="color:white !important;">Berita</h2>
                        </div>
                        <div class="col-md-9">
                            <p class="pt-2">Temukan informasi terbaru seputar kesehatan mata, gangguan
                                penglihatan, dan
                                tips perawatan visual yang relevan dan terpercaya</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        @forelse($articles->take(3) as $article)
                            <div class="col-lg-4">
                                <div class="card h-100 border-0">
                                    <img src="{{ asset('storage/' . $article->image) }}" class="news-img"
                                        alt="{{ $article->title }}">
                                    <div class="card-body">
                                        <span class="news-date">{{ $article->created_at->format('d F Y') }}</span>
                                        <h5 class="fw-bold mb-3 mt-2">{{ Str::limit($article->title, 50) }}</h5>
                                        <a href="{{ route('fe.news.detail', $article->slug) }}" class="btn-promo">
                                            Baca selengkapnya <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-muted">Belum ada berita terbaru.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn-navy" onclick="window.location.href='/news'">Selengkapnya</button>
                    </div>
                </div>
            </section>

        </div>
    </div>





    <div class="end-container" style="position: relative;">


        <!-- 7. F.A.Q -->
        <section class="faq-section" id="faq">
            <div class="container">
                <h2 class="section-title mb-5">F.A.Q</h2>
                <div class="row">
                    <!-- Left Side - Topic Tabs -->
                    <div class="col-lg-5 mb-lg-0 mb-4">
                        @foreach ($faqCategories as $faqCategory)
                            <div class="faq-topic-item" data-topic="{{ $faqCategory->slug }}">
                                <span>{{ $faqCategory->name }}</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right Side - Dynamic Content -->
                    <div class="col-lg-7">
                        <div class="faq-right-box">
                            @foreach ($faqCategories as $faqCategory)
                                <div class="faq-content-section {{ $loop->first ? 'active' : '' }}"
                                    id="faq-{{ $faqCategory->slug }}">
                                    <h5 class="fw-bold mb-4">{{ $faqCategory->name }}</h5>

                                    @foreach ($faqCategory->faqs as $faq)
                                        <div class="faq-accordion-item"
                                            id="faq-{{ $faqCategory->slug }}-{{ $faq->id }}">
                                            <button class="faq-accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-{{ $faqCategory->slug }}-{{ $faq->id }}">
                                                <span>{{ $faq->question }}</span>
                                                <i class="fas fa-chevron-down faq-icon"></i>
                                            </button>
                                            <div id="faq-{{ $faqCategory->slug }}-{{ $faq->id }}" class="collapse">
                                                <div class="faq-accordion-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="end-wrapper">

            <!-- 8. PILIHAN ASURANSI -->
            <section class="asuransi-section container" style="">
                <div class="container text-center">
                    <h3 class="fw-bold mb-5">Pilihan Asuransi</h3>
                    <div class="">
                        <div class="splide asuransiSwiper">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($insurances as $item)
                                        <li class="splide__slide">
                                            <div class="text-center">
                                                <img src="{{ asset('storage/' . $item->logo) }}" height="120"
                                                    alt="{{ $item->name }}">
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 9. TESTIMONI (4 CARD VISIBLE) -->
            <section class="testi-section">
                <div class="container">
                    <h2 class="fw-bold mb-5 text-center text-white">
                        Dipercaya Banyak Orang
                    </h2>

                    <div class="swiper testimonialSwiper">
                        <div class="swiper-wrapper" id="testimonial-swiper">


                        </div>
                    </div>
                </div>
            </section>


            <!-- 10. INSTAGRAM FEED -->
            <section class="insta-section">
                <div class="container">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

                        <h3 class="fw-bold">@klinikmatatritya.official</h3>

                        <a href="https://www.instagram.com/klinikmatatritya.official/" target="_blank"
                            class="">Selengkapnya</a>
                    </div>

                    <div class="swiper instagramSwiper">
                        <div class="swiper-wrapper" id="insta-feed-container">
                            <div class="swiper-slide">
                                <div class="py-5 text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function redirectToWhatsapp() {
            const role = document.getElementById('roleSelect').value;
            const search = document.getElementById('searchSelect').value;

            const message = `Halo, saya seorang ${role} sedang mencari informasi ${search}.`;

            const phoneNumber = '6282112110048';
            const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(whatsappURL, '_blank');
        }
    </script>


@endsection
