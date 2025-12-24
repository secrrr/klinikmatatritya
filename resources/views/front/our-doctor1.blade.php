@extends('layouts.app')

@section('title', 'Jadwal Praktek Dokter - Klinik Mata Tritya')

@section('styles')
<style>
    :root {
        --primary-blue: #182366;
        --light-blue-gradient-start: #eef7ff;
        --light-blue-gradient-end: #4a8adb;
        --card-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    body {
        background-color: #f8f9fa;
    }

    /* --- SECTION BACKGROUND --- */
    .schedule-page-wrapper {
        /* Membuat background gradasi biru seperti di desain */
        background: linear-gradient(180deg, #ffffff 0%, #e3f2fd 20%, #4378d4 100%);
        padding-bottom: 60px;
        min-height: 100vh;
    }

    /* --- HEADER TITLE --- */
    .schedule-header {
        text-align: center;
        padding-top: 40px;
        padding-bottom: 60px;
    }
    
    .schedule-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 2.5rem;
        color: #2c5ba5; /* Warna biru judul */
        text-shadow: 2px 2px 0px #ffffff;
        margin-bottom: 5px;
    }

    .schedule-subtitle {
        font-weight: 600;
        color: #182366;
        font-size: 1.1rem;
    }

    /* --- DOCTOR CARD DESIGN --- */
    .doc-card-wrapper {
        margin-top: 50px; /* Memberi ruang untuk kepala yang menyembul */
        margin-bottom: 30px;
        height: 100%;
    }

    .doc-card {
        background: white;
        border-radius: 20px;
        padding: 0 20px 20px 20px;
        position: relative;
        box-shadow: var(--card-shadow);
        text-align: center;
        height: 100%;
        transition: transform 0.3s ease;
        border: none;
    }

    .doc-card:hover {
        transform: translateY(-5px);
    }

    /* Foto Dokter Bulat Menyembul */
    .doc-img-container {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        position: relative;
        top: -50px; /* Menarik foto ke atas keluar dari kartu */
        margin-bottom: -40px; /* Mengkompensasi ruang kosong */
    }

    .doc-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background-color: #eee;
    }

    .doc-name {
        color: var(--primary-blue);
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 15px;
        min-height: 48px; /* Agar tinggi kartu seragam jika nama panjang */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Tabel Jadwal Kecil */
    .schedule-table {
        width: 100%;
        font-size: 0.8rem;
        color: #444;
        margin: 0 auto;
    }

    .schedule-table tr td {
        padding: 3px 0;
        vertical-align: top;
    }

    .schedule-table .day {
        font-weight: 600;
        text-align: left;
        width: 45px;
    }
    
    .schedule-table .separator {
        width: 10px;
        text-align: center;
    }

    .schedule-table .time {
        text-align: left;
    } 
    
    /* Responsiveness adjustments */
    @media (max-width: 768px) {
        .schedule-title {
            font-size: 1.8rem;
        }
        .doc-card-wrapper {
            margin-top: 60px;
        }
    }
</style>
@endsection

@section('content')

<div class="schedule-page-wrapper">
    <div class="container">
        
        <!-- Header -->
        <div class="schedule-header">
            <h1 class="schedule-title">Jadwal Praktek Dokter</h1>
            <p class="schedule-subtitle">Klinik Mata Tritya | Periode: {{ date('F Y') }}</p>
        </div>

        <!-- Grid Dokter -->
        <!-- Justify-content-center agar jika kartu ganjil tetap di tengah -->
        <div class="row justify-content-center">
            
            {{-- LOOPING DOKTER DIMULAI DI SINI --}}
            {{-- Contoh Data Statis untuk visualisasi (Ganti dengan @foreach($doctors as $doctor)) --}}
            
            <!-- Dokter 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <!-- Ganti src dengan foto dokter dari database -->
                        <img src="https://img.freepik.com/free-photo/portrait-smiling-handsome-male-doctor-man_171337-5055.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Rizki Adelia, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Senin</td><td class="separator">:</td><td class="time">08.00 - 11.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">10.00 - 14.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">16.30 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Jumat</td><td class="separator">:</td><td class="time">11.30 - 15.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/asian-doctor-with-stethoscope_1098-18451.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Heni Riyanto, Sp.M(K)</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Senin</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">14.00 - 17.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">14.00 - 17.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Jumat</td><td class="separator">:</td><td class="time">08.00 - 11.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/young-man-cafe_23-2148232924.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Andityo Sidohutomo, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Senin</td><td class="separator">:</td><td class="time">12.00 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">18.00 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">08.00 - 10.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Minggu</td><td class="separator">:</td><td class="time">16.00 - 20.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/portrait-smiling-handsome-male-doctor-man_171337-5055.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Armanto Sidohutomo, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Senin</td><td class="separator">:</td><td class="time">10.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">18.00 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">12.00 - 14.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Minggu</td><td class="separator">:</td><td class="time">16.30 - 20.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            

             <!-- Baris Kedua (Contoh) -->
             <div class="w-100 d-none d-lg-block"></div> {{-- Break row for large screens if needed to strictly follow layout --}}

<!-- Dokter 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/scientist-working-lab_23-2148970342.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Listya Dyah R., Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Senin</td><td class="separator">:</td><td class="time">12.00 - 14.30 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Jumat</td><td class="separator">:</td><td class="time">16.30 - 20.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/smiling-asian-female-doctor-lab-coat-looking-camera_1098-18457.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Kristina Radika Hipa, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">16.30 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">12.00 - 15.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

             <!-- Dokter 7 -->
             <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/portrait-asian-woman-drinking-coffee_1098-19253.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Himawati Nirmalasari, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Selasa</td><td class="separator">:</td><td class="time">08.00 - 12.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Rabu</td><td class="separator">:</td><td class="time">15.00 - 18.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">12.00 - 14.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/nurse-portrait-hospital_23-2150794939.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Asti Indriani, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Sabtu</td><td class="separator">:</td><td class="time">10.00 - 12.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            <!-- Dokter 9 -->
            <div class="col-lg-3 col-md-4 col-sm-6 doc-card-wrapper">
                <div class="doc-card">
                    <div class="doc-img-container">
                        <img src="https://img.freepik.com/free-photo/woman-doctor-wearing-lab-coat-with-stethoscope-isolated_1303-29791.jpg" alt="Dokter" class="doc-img">
                    </div>
                    <h5 class="doc-name">dr. Paramitha Putri, Sp.M</h5>
                    <hr>
                    <table class="schedule-table">
                        <tr>
                            <td class="day">Kamis</td><td class="separator">:</td><td class="time">17.00 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Jumat</td><td class="separator">:</td><td class="time">16.00 - 20.00 WIB</td>
                        </tr>
                        <tr>
                            <td class="day">Sabtu</td><td class="separator">:</td><td class="time">08.00 - 10.00 WIB</td>
                        </tr>
                    </table>
                    <div class="mt-4 text-center">
                        <a href="{{ route('fe.doctors.detail') }}" class="btn btn-primary w-100 rounded-pill fw-bold" style="background-color: var(--primary-blue); border: none; padding: 10px 0;">Lihat Profil</a>
                    </div>
                </div>
            </div>

            {{-- END LOOPING --}}

        </div>
 
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Script tambahan jika diperlukan
</script>
@endsection