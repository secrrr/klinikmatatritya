<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Practitioner - Apply</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome untuk Icon Paperclip -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-navy: #202c85;
            /* Warna biru gelap tombol/logo */
            --bg-light: #f9f9f9;
            --footer-bg: #f1f2f4;
            --input-border: #e0e0e0;
            --text-dark: #333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: var(--text-dark);
        }

        /* --- Header Section --- */
        .header-section {
            padding: 40px 0;
            padding-top: 100px;
            border-bottom: 1px solid #eee;
        }

        .logo-img {
            max-height: 50px;
            margin-bottom: 20px;
        }

        .job-title {
            font-weight: 700;
            font-size: 2.5rem;
            color: #222;
        }

        .job-type {
            font-size: 1.2rem;
            color: #444;
            font-weight: 400;
        }

        /* --- Form Section --- */
        .form-section {
            padding: 60px 0;
            background-color: #fff;
        }

        .form-label-custom {
            font-weight: 400;
            color: #333;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--input-border);
            border-radius: 5px;
            padding: 12px 15px;
            font-size: 0.95rem;
            color: #666;
            background-color: #fff;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-navy);
            box-shadow: 0 0 0 0.2rem rgba(32, 44, 133, 0.15);
        }

        /* Custom File Upload Button */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-upload-custom {
            background-color: #e9ecef;
            color: #333;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            align-items: center;
            width: fit-content;
        }

        .btn-upload-custom:hover {
            background-color: #dee2e6;
        }

        .file-name-display {
            margin-left: 10px;
            font-size: 0.85rem;
            color: #666;
            font-style: italic;
        }

        /* Submit Button */
        .btn-submit {
            background-color: var(--primary-navy);
            color: white;
            padding: 12px 40px;
            border-radius: 50px;
            /* Rounded pill style */
            font-weight: 500;
            border: none;
            margin-top: 30px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #1a236e;
            color: white;
        }

        /* --- Footer Section --- */
        .footer-section {
            background-color: var(--footer-bg);
            padding: 40px 0;
            text-align: center;
            margin-top: 50px;
        }

        .footer-link {
            color: var(--primary-navy);
            text-decoration: underline;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .copyright-text {
            color: #666;
            font-size: 0.85rem;
            margin-top: 10px;
        }

        /* Responsiveness for Labels */
        @media (max-width: 768px) {
            .form-label-custom {
                margin-bottom: 5px;
            }

            .row-mb {
                margin-bottom: 15px;
            }
        }

        @media (min-width: 769px) {
            .row-mb {
                margin-bottom: 25px;
                /* Jarak antar baris form */
            }
        }
    </style>
</head>

<body>

    <!-- 1. Header Section -->
    <header class="header-section">
        <div class="container">
            <!-- Placeholder Logo (Ganti src dengan logo asli Anda) -->
            <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('img/logo.png') }}" alt="" class="logo-img" width="100">
            </div>

            <h1 class="job-title">dr. Nguyen Minh Anh, Sp.M.</h1>
            <p class="job-type">General Practitioner</p>
        </div>
    </header>

    <!-- 2. Form Section -->
    <main class="form-section">
        <div class="container">
            <form id="appointmentForm">

                <!-- Nama Lengkap -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="nama" class="form-label-custom">Nama Lengkap</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nama" placeholder="Jane Doe">
                    </div>
                </div>

                <!-- E-mail -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="email" class="form-label-custom">E-mail</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" placeholder="abc@email.com">
                    </div>
                </div>

                <!-- Nomor HP -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="phone" class="form-label-custom">Nomor HP</label>
                    </div>
                    <div class="col-md-9">
                        <input type="tel" class="form-control" id="phone" placeholder="Cth; 08000000000000">
                    </div>
                </div>

                <!-- Jadwal Booking -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="jadwal" class="form-label-custom">Jadwal Booking</label>
                    </div>
                    <div class="col-md-9">
                        <input type="datetime-local" class="form-control" id="jadwal">
                    </div>
                </div>

                <!-- Keluhan -->
                <div class="row row-mb">
                    <div class="col-md-3">
                        <label for="keluhan" class="form-label-custom">Keluhan</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" id="keluhan" rows="5"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-4">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-submit">Buat Janji</button>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <!-- 3. Footer Section -->
    <footer class="footer-section">
        <div class="container">
            <a href="#" class="footer-link">Klinik Mata Tritya Homepage</a>
            <p class="copyright-text">Copyright © 2025 Klinik Mata Tritya. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
