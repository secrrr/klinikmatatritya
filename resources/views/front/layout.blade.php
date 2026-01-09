<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Klinik Mata Tritya')</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(90deg, #0d6efd33, #6c757d11);
            padding: 60px 0
        }

        .service-card img {
            max-height: 180px;
            object-fit: cover
        }

        footer {
            background: #f8f9fa;
            padding: 30px 0;
            margin-top: 40px
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><img
                    src="https://via.placeholder.com/180x50?text=Klinik+Mata" alt="logo"></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"> <span
                    class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse collapse" id="nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('doctors.index') }}">Dokter</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Klinik Mata Tritya - Clone Lokal</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
