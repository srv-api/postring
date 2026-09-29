<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>Verifikasi Email - Tring POS</title>

    <link
        rel="icon"
        href="{{ asset('tring.png') }}"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --primary: #7F0079;
            --primary-dark: #650061;
            --primary-light: #F8EAF7;
            --text: #202020;
            --muted: #777;
            --border: #e5e5e5;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f7f7f8;
            color: var(--text);
            min-height: 100vh;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /*
        |--------------------------------------------------------------------------
        | Left Branding
        |--------------------------------------------------------------------------
        */

        .brand-panel {
            width: 50%;
            min-height: 100vh;
            background: linear-gradient(
                145deg,
                var(--primary),
                var(--primary-dark)
            );
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }

        .brand-content {
            width: 100%;
            max-width: 480px;
        }

        .brand-logo {
            margin-bottom: 55px;
        }

        .brand-logo img {
            width: 145px;
            height: auto;
            display: block;
        }

        .brand-content h1 {
            font-size: 42px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .brand-content > p {
            font-size: 16px;
            line-height: 1.7;
            opacity: .9;
            margin-bottom: 40px;
            max-width: 430px;
        }

        .benefits {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .benefit-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .14);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .benefit span {
            font-size: 14px;
            opacity: .95;
        }

        /*
        |--------------------------------------------------------------------------
        | Right Content
        |--------------------------------------------------------------------------
        */

        .auth-main {
            width: 50%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .auth-card {
            width: 100%;
            max-width: 470px;
        }

        .mobile-logo {
            display: none;
            text-align: center;
            margin-bottom: 35px;
        }

        .mobile-logo img {
            width: 125px;
        }

        .auth-card h2 {
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .auth-subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */

        .alert {
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.5;
        }

        .alert-success {
            background: #edf9f0;
            border: 1px solid #ccebd4;
            color: #217a38;
        }

        .alert-danger {
            background: #fff0f0;
            border: 1px solid #f2cccc;
            color: #b42318;
        }

        /*
        |--------------------------------------------------------------------------
        | Email Info
        |--------------------------------------------------------------------------
        */

        .email-info {
            background: var(--primary-light);
            border: 1px solid #ead0e8;
            border-radius: 14px;
            padding: 18px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 25px;
        }

        .email-info-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: white;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 19px;
        }

        .email-info-text strong {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .email-info-text span {
            color: #666;
            font-size: 12px;
            line-height: 1.6;
        }

        /*
        |--------------------------------------------------------------------------
        | Button
        |--------------------------------------------------------------------------
        */

        .btn-primary {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 11px;
            background: var(--primary);
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        .logout-form {
            margin-top: 15px;
        }

        .btn-logout {
            width: 100%;
            height: 48px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: white;
            color: #555;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-logout:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .auth-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }

        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        @media (max-width: 900px) {

            .brand-panel {
                display: none;
            }

            .auth-main {
                width: 100%;
                padding: 30px 20px;
            }

            .mobile-logo {
                display: block;
            }

            .auth-card {
                max-width: 460px;
            }
        }

        @media (max-width: 480px) {

            .auth-main {
                padding: 25px 18px;
            }

            .auth-card h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="auth-wrapper">

    <!--
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    -->

    <div class="brand-panel">

        <div class="brand-content">

            <div class="brand-logo">
                <img
                    src="{{ asset('tr.png') }}"
                    alt="Tring POS"
                >
            </div>

            <h1>
                Satu akun untuk
                semua kebutuhan.
            </h1>

            <p>
                Kelola bisnis dengan lebih mudah bersama Tring POS.
                Pastikan email kamu terverifikasi untuk menjaga keamanan
                akun dan transaksi.
            </p>

            <div class="benefits">

                <div class="benefit">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <span>
                        Akun lebih aman dan terlindungi
                    </span>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <span>
                        Kelola toko dan transaksi dengan mudah
                    </span>
                </div>

                <div class="benefit">
                    <div class="benefit-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <span>
                        Akses fitur Tring POS dengan cepat
                    </span>
                </div>

            </div>

        </div>

    </div>


    <!--
    |--------------------------------------------------------------------------
    | Verification
    |--------------------------------------------------------------------------
    -->

    <div class="auth-main">

        <div class="auth-card">

            <div class="mobile-logo">
                <img
                    src="{{ asset('tr.png') }}"
                    alt="Tring POS"
                >
            </div>


            <h2>
                Verifikasi Email
            </h2>

            <p class="auth-subtitle">
                Satu langkah lagi untuk mengaktifkan akun Tring POS kamu.
            </p>


            @if (session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif


            @if (session('status'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('status') }}
                </div>
            @endif


            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif


            <div class="email-info">

                <div class="email-info-icon">
                    <i class="bi bi-envelope-check"></i>
                </div>

                <div class="email-info-text">

                    <strong>
                        Cek email kamu
                    </strong>

                    <span>
                        Kami telah mengirimkan link verifikasi
                        ke alamat email yang kamu gunakan saat mendaftar.
                        Buka email tersebut dan klik tombol verifikasi.
                    </span>

                </div>

            </div>


            <!-- Kirim ulang -->
            <form
                method="POST"
                action="{{ route('verification.send') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="btn-primary"
                >
                    <i class="bi bi-send me-1"></i>
                    Kirim Ulang Email Verifikasi
                </button>

            </form>


            <!-- Logout -->
            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="btn-logout"
                >
                    <i class="bi bi-box-arrow-left me-1"></i>
                    Keluar
                </button>

            </form>


            <div class="auth-footer">
                &copy; {{ date('Y') }} Tring POS
            </div>

        </div>

    </div>

</div>

</body>
</html>