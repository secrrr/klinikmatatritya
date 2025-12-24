<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Mata Tritya')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    @yield('styles')
</head>

<body>

    @include('components.navbar')

    @yield('content')

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



    @yield('scripts')
</body>

</html>
