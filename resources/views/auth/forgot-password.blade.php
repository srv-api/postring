
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lupa Password - Tring.id</title>

    <link rel="icon" type="image/png" href="{{ asset('tring.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #7F0079;
            --primary-dark: #650061;
            --primary-light: #F8EAF7;
            --white: #FFFFFF;
            --black: #171717;
            --gray-1: #525252;
            --gray-2: #737373;
            --gray-3: #A3A3A3;
            --border: #E5E5E5;
            --background: #FAFAFA;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--black);
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        /* LOGIN LAYOUT */

        .login-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* BRANDING */

        .login-brand {
            position: relative;
            overflow: hidden;

            background: linear-gradient(
                145deg,
                #7F0079 0%,
                #650061 55%,
                #42003F 100%
            );

            color: var(--white);

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 45px 55px;
        }

        .brand-decoration {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.10);
            pointer-events: none;
        }

        .decoration-one {
            width: 500px;
            height: 500px;
            right: -230px;
            top: -180px;
        }

        .decoration-two {
            width: 400px;
            height: 400px;
            right: -150px;
            bottom: -180px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;

            position: relative;
            z-index: 1;
        }

        .brand-logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-logo span {
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-content {
            position: relative;
            z-index: 1;
            max-width: 500px;
            margin: auto 0;
            padding: 60px 0;
        }

        .brand-content h1 {
            font-size: clamp(35px, 4vw, 52px);
            line-height: 1.2;
            letter-spacing: -2px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .brand-content h1 span {
            color: #F5B9F1;
        }

        .brand-content p {
            color: rgba(255,255,255,.75);
            font-size: 14px;
            line-height: 1.9;
            max-width: 420px;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 17px;
            margin-top: 35px;
        }

        .brand-feature {
            display: flex;
            align-items: center;
            gap: 12px;

            color: rgba(255,255,255,.9);
            font-size: 12px;
            font-weight: 500;
        }

        .brand-feature i {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;
            background: rgba(255,255,255,.12);

            font-size: 15px;
        }

        .brand-footer {
            position: relative;
            z-index: 1;

            color: rgba(255,255,255,.55);
            font-size: 10px;
        }

        /* FORM AREA */

        .login-main {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 35px;
            background: var(--white);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
        }

        .mobile-logo {
            display: none;
        }

        .login-heading {
            margin-bottom: 30px;
        }

        .login-heading h2 {
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .login-heading p {
            color: var(--gray-2);
            font-size: 13px;
            line-height: 1.7;
        }

        /* ALERT */

        .alert-success {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            padding: 13px 15px;
            margin-bottom: 22px;

            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-radius: 10px;

            color: #166534;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            padding: 13px 15px;
            margin-bottom: 22px;

            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 10px;

            color: #B91C1C;
            font-size: 12px;
            line-height: 1.6;
        }

        /* FORM */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;

            color: var(--gray-1);
            font-size: 12px;
            font-weight: 700;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);

            color: var(--gray-3);
            font-size: 16px;

            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 52px;

            padding: 0 45px;

            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;

            color: var(--black);
            font-size: 13px;

            outline: none;

            transition: .2s ease;
        }

        .form-control::placeholder {
            color: #B5B5B5;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(127,0,121,.08);
        }

        .form-control.is-invalid {
            border-color: #DC2626;
        }

        .invalid-feedback {
            display: block;
            margin-top: 7px;

            color: #DC2626;
            font-size: 11px;
        }

        /* BUTTON */

        .login-button {
            width: 100%;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            background: var(--primary);
            color: var(--white);

            border: none;
            border-radius: 10px;

            font-size: 13px;
            font-weight: 700;

            box-shadow: 0 5px 15px rgba(127,0,121,.15);

            transition: .2s ease;
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(127,0,121,.22);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* BACK TO LOGIN */

        .register-text {
            margin-top: 25px;
            text-align: center;
            color: var(--gray-2);
            font-size: 12px;
        }

        .register-text a {
            color: var(--primary);
            font-weight: 700;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .login-page {
                grid-template-columns: 1fr;
            }

            .login-brand {
                display: none;
            }

            .login-main {
                min-height: 100vh;
                padding: 40px 25px;
            }

            .login-card {
                max-width: 430px;
            }

            .mobile-logo {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;

                margin-bottom: 40px;

                color: var(--primary);
                font-size: 24px;
                font-weight: 800;
            }

            .mobile-logo img {
                width: 42px;
                height: 42px;
                object-fit: contain;
            }
        }

        @media (max-width: 480px) {
            .login-main {
                padding: 30px 22px;
            }

            .mobile-logo {
                margin-bottom: 35px;
            }

            .login-heading h2 {
                font-size: 26px;
            }

            .login-heading p {
                font-size: 12px;
            }

            .form-control {
                height: 50px;
            }

            .login-button {
                height: 50px;
            }
        }
    </style>
</head>

<body>

<main class="login-page">

    {{-- BRANDING PANEL --}}

    <section class="login-brand">

        <div class="brand-decoration decoration-one"></div>
        <div class="brand-decoration decoration-two"></div>

        <a href="{{ url('/') }}" class="brand-logo">
            <img src="{{ asset('tr.png') }}" alt="Tring.id">
            <span>Tring.id</span>
        </a>

        <div class="brand-content">

            <h1>
                Satu akun,<br>
                banyak kemudahan<br>
                <span>sekali Tring!</span>
            </h1>

            <div class="brand-features">

                <div class="brand-feature">
                    <i class="bi bi-controller"></i>
                    <span>Top up game favoritmu dengan mudah</span>
                </div>

                <div class="brand-feature">
                    <i class="bi bi-wallet2"></i>
                    <span>Akses layanan digital Tring.id</span>
                </div>

                <div class="brand-feature">
                    <i class="bi bi-shield-check"></i>
                    <span>Akun dan transaksi lebih terorganisir</span>
                </div>

            </div>

        </div>

        <div class="brand-footer">
            © {{ date('Y') }} Tring.id. All rights reserved.
        </div>

    </section>

    {{-- FORGOT PASSWORD FORM --}}

    <section class="login-main">

        <div class="login-card">

            {{-- MOBILE LOGO --}}

            <a href="{{ url('/') }}" class="mobile-logo">
                <img src="{{ asset('tr.png') }}" alt="Tring.id">
                <span>Tring.id</span>
            </a>

            {{-- HEADING --}}

            <div class="login-heading">

                <h2>Lupa Password?</h2>

                <p>
                    Jangan khawatir! Masukkan alamat email
                    yang terdaftar untuk menerima tautan
                    pengaturan ulang password.
                </p>

            </div>

            {{-- SUCCESS MESSAGE --}}

            @if (session('status'))
                <div class="alert-success">
                    <i class="bi bi-check-circle-fill"></i>

                    <div>
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            {{-- ERROR MESSAGE --}}

            @if ($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>

                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- FORM --}}

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">

                    <label for="email" class="form-label">
                        Alamat Email
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>

                    @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <button type="submit" class="login-button">

                    <span>Kirim Link Reset Password</span>

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>

            {{-- BACK TO LOGIN --}}

            <div class="register-text">
                <a href="{{ route('login') }}">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Login
                </a>
            </div>

        </div>

    </section>

</main>

</body>
</html>