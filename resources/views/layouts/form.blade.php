<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Practitioner - Apply</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome untuk Icon Paperclip -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
                <!-- Saya menggunakan icon mata sederhana sebagai placeholder logo -->
                <i class="fas fa-eye fa-2x me-2" style="color: var(--primary-navy);"></i>
                <span style="color: var(--primary-navy); font-weight: bold; font-size: 14px; line-height: 1.2;">KLINIK
                    MATA TRITYA</span>
            </div>

            <h1 class="job-title">General Practitioner</h1>
            <p class="job-type">Kontrak</p>
        </div>
    </header>

    <!-- 2. Form Section -->
    <main class="form-section">
        <div class="container">
            <form id="applicationForm">

                <!-- Resume/CV -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label class="form-label-custom">Resume/CV</label>
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex align-items-center">
                            <label for="cv_upload" class="btn-upload-custom">
                                <i class="fas fa-paperclip me-2"></i> ATTACH RESUME/CV
                            </label>
                            <input type="file" id="cv_upload" hidden accept=".pdf,.doc,.docx">
                            <span id="fileName" class="file-name-display"></span>
                        </div>
                    </div>
                </div>

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

                <!-- Lokasi Saat Ini -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="lokasi" class="form-label-custom">Lokasi Saat Ini</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" id="lokasi">
                            <option selected>Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <!-- Darimana anda mendengar... -->
                <div class="row align-items-center row-mb">
                    <div class="col-md-3">
                        <label for="sumber" class="form-label-custom">Darimana anda mendengar tentang pekerjaan
                            ini?</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-select" id="sumber">
                            <option selected>LinkedIn</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Website">Website</option>
                            <option value="Teman">Teman</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-4">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-submit">Ajukan Lamaran</button>
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

    <!-- JavaScript Custom untuk File Upload -->
    <script>
        document.getElementById('cv_upload').addEventListener('change', function(event) {
            const input = event.target;
            const fileNameSpan = document.getElementById('fileName');

            if (input.files && input.files.length > 0) {
                fileNameSpan.textContent = input.files[0].name;
                fileNameSpan.style.color = "#202c85"; // Ubah warna teks jadi biru saat file dipilih
            } else {
                fileNameSpan.textContent = "";
            }
        });

        // Optional: Prevent default submit untuk demo
        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Lamaran berhasil dikirim (Demo)');
        });
    </script>
</body>

</html>
