<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedang Renovasi - Klinik Mata Tritya</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #0a58ca;
            --secondary: #6c757d;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .maintenance-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Banner Section */
        .banner-section {
            background: linear-gradient(135deg, #282db8 0%, #1D2088 100%);
            color: white;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            padding: 2rem;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        }

        .banner-content {
            z-index: 2;
            max-width: 600px;
        }

        .banner-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .banner-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease-out 0.2s backwards;
        }

        .banner-btn {
            background-color: white;
            color: var(--primary);
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .banner-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background-color: #f8f9fa;
            color: var(--primary-dark);
        }

        /* Bottom Section */
        .actions-section {
            flex: 0.8;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            padding: 2rem;
            background-color: white;
        }

        .action-card {
            text-align: center;
            padding: 2rem;
            border-radius: 1rem;
            transition: all 0.3s ease;
            max-width: 300px;
        }

        .action-card:hover {
            transform: translateY(-5px);
        }

        .action-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #4b5563;
        }

        .action-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .action-text {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .action-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-block;
            min-width: 140px;
        }

        .btn-login {
            background-color: #059669;
            color: white;
        }

        .btn-login:hover {
            background-color: #047857;
            color: white;
        }

        .btn-contact {
            background-color: #059669;
            color: white;
        }

        .btn-contact:hover {
            background-color: #047857;
            color: white;
        }

        /* Construction Animation */
        .construction-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.2);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            body {
                overflow: auto;
                height: auto;
                display: block;
            }

            .maintenance-container {
                height: auto;
                min-height: 100vh;
            }

            .banner-section {
                padding: 3rem 1.5rem;
                min-height: auto;
                clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);
            }

            .banner-title {
                font-size: 1.8rem;
                margin-bottom: 0.5rem;
            }

            .banner-subtitle {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .actions-section {
                flex-direction: column;
                padding: 2rem 1rem;
                gap: 1.5rem;
            }

            .action-card {
                padding: 1.5rem;
                width: 100%;
                max-width: 100%;
            }

            .construction-icon {
                font-size: 4rem;
            }
        }
    </style>
</head>

<body>
    <div class="maintenance-container">
        <!-- Top Banner -->
        <div class="banner-section">
            <i class="fas fa-paint-roller construction-icon"></i>
            <div class="banner-content">
                <div class="mb-4">
                    <!-- You might want to add a logo here if available -->
                    <!-- <img src="path_to_logo" height="50"> -->
                </div>
                <h1 class="banner-title">Kami Sedang Renovasi Rumah!</h1>
                <p class="banner-subtitle">
                    Saat ini website sedang dalam mode maintenance.
                </p>
            </div>
        </div>

        <!-- Bottom Actions -->
        <div class="actions-section">
            <!-- Admin Login -->
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="action-title">Kelola Akun Saya</h3>
                <p class="action-text">Pergi ke halaman akun anda untuk memanage website anda</p>
                <a href="{{ route('admin.login') }}" class="action-btn btn-login">Login</a>
            </div>

            <!-- Contact Support -->
            <div class="action-card">
                <div class="action-icon">
                    <i class="far fa-question-circle"></i>
                </div>
                <h3 class="action-title">Bantuan Teknis Profesional</h3>
                <p class="action-text">Hubungi kami CS Tritya profesional support@klinikmatatritya.co.id</p>
                <a href="mailto:support@klinikmatatritya.co.id" class="action-btn btn-contact">Hubungi Kami</a>
            </div>
        </div>
    </div>
</body>

</html>
