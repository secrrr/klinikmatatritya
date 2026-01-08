<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #0b2545;
            color: #fff;
            padding: 20px;
            position: fixed;
            width: 220px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 0;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #1c4373;
            border-radius: 5px;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4>Klinik Admin</h4>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.services.index') }}">Services</a>
        <a href="{{ route('admin.articles.index') }}">Articles</a>
        <a href="{{ route('admin.doctors.index') }}">Doctors</a>
        <a href="{{ route('admin.settings.analytics') }}"><i class="bi bi-graph-up"></i> Analytics</a>
        <a href="{{ route('admin.settings.logo') }}"><i class="bi bi-image"></i> Logo</a>
        <a href="{{ route('admin.settings.social') }}"><i class="bi bi-share"></i> Social Links</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
