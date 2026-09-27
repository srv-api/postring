<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar - Tring.id</title>

    {{-- Favicon --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('tring.png') }}"
    >

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --primary: #7F0079;
            --primary-dark: #650061;
            --primary-light: #F8EAF7;

            --text: #252126;
            --muted: #77717a;
            --border: #e5e0e6;

            --white: #ffffff;
            --danger: #dc2626;

            --radius: 9px;
        }

        /* =====================================================
           RESET
        ====================================================== */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family: "Inter", sans-serif;
            color: var(--text);
            background: #f7f5f8;

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =====================================================
           MAIN WRAPPER
        ====================================================== */

        .register-wrapper {
            min-height: 100vh;

            display: flex;
        }

        /* =====================================================
           LEFT BRAND PANEL
        ====================================================== */

        .brand-panel {
            position: relative;

            width: 43%;
            min-height: 100vh;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 30px 42px;

            overflow: hidden;

            color: #ffffff;

            background:
                radial-gradient(
                    circle at 15% 10%,
                    rgba(255, 255, 255, 0.14),
                    transparent 35%
                ),
                linear-gradient(
                    145deg,
                    #85007e 0%,
                    #650061 65%,
                    #4b0048 100%
                );
        }

        /* Decorative circle */

        .brand-panel::before {
            content: "";

            position: absolute;

            width: 430px;
            height: 430px;

            right: -210px;
            bottom: -180px;

            border: 1px solid rgba(255, 255, 255, 0.12);

            border-radius: 50%;

            pointer-events: none;
        }

        .brand-panel::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            right: -130px;
            bottom: -110px;

            border: 1px solid rgba(255, 255, 255, 0.10);

            border-radius: 50%;

            pointer-events: none;
        }

        /* =====================================================
           BRAND LOGO
        ====================================================== */

        .brand-logo {
            position: relative;
            z-index: 2;
        }

        .brand-logo-link {
            display: inline-flex;
            align-items: center;

            gap: 9px;

            color: #ffffff;

            text-decoration: none;
        }

        .brand-logo img {
            display: block;

            width: 34px;
            height: 34px;

            object-fit: contain;
        }

        .brand-logo span {
            color: #ffffff;

            font-size: 18px;
            font-weight: 800;

            letter-spacing: -0.6px;

            line-height: 1;
        }

        /* =====================================================
           BRAND CONTENT
        ====================================================== */

        .brand-content {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 420px;

            margin: 0 auto;
        }

        /* Brand label */

        .brand-label {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 18px;
            padding: 7px 12px;

            border: 1px solid rgba(255, 255, 255, 0.22);

            border-radius: 30px;

            background: rgba(255, 255, 255, 0.08);

            color: #ffffff;

            font-size: 11px;
            font-weight: 600;
        }

        .brand-label i {
            font-size: 12px;
        }

        /* Heading */

        .brand-content h1 {
            margin-bottom: 13px;

            font-size: clamp(30px, 3vw, 43px);
            line-height: 1.15;

            font-weight: 800;

            letter-spacing: -1.4px;
        }

        .brand-content h1 span {
            color: #ffd8fb;
        }

        /* Description */

        .brand-content p {
            max-width: 370px;

            color: rgba(255, 255, 255, 0.78);

            font-size: 13px;
            line-height: 1.65;
        }

        /* =====================================================
           BENEFITS
        ====================================================== */

        .brand-benefits {
            display: grid;

            gap: 11px;

            margin-top: 24px;
        }

        .benefit-item {
            display: flex;
            align-items: center;

            gap: 10px;

            color: rgba(255, 255, 255, 0.90);

            font-size: 12px;
        }

        .benefit-icon {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 9px;

            background: rgba(255, 255, 255, 0.11);

            font-size: 14px;
        }

        /* =====================================================
           BRAND FOOTER
        ====================================================== */

        .brand-footer {
            position: relative;
            z-index: 2;

            color: rgba(255, 255, 255, 0.60);

            font-size: 10px;
        }

        /* =====================================================
           RIGHT FORM PANEL
        ====================================================== */

        .form-panel {
            width: 57%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 25px 40px;

            background: #ffffff;
        }

        .register-card {
            width: 100%;
            max-width: 600px;
        }

        /* =====================================================
           MOBILE LOGO
        ====================================================== */

        .mobile-logo {
            display: none;

            margin-bottom: 22px;

            text-align: center;
        }

        .mobile-logo-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            color: var(--primary);

            text-decoration: none;
        }

        .mobile-logo img {
            display: block;

            width: 30px;
            height: 30px;

            object-fit: contain;
        }

        .mobile-logo span {
            color: var(--primary);

            font-size: 18px;
            font-weight: 800;

            letter-spacing: -0.6px;

            line-height: 1;
        }

        /* =====================================================
           FORM HEADING
        ====================================================== */

        .form-heading {
            margin-bottom: 20px;
        }

        .form-heading h2 {
            margin-bottom: 5px;

            color: var(--text);

            font-size: 26px;
            line-height: 1.2;

            font-weight: 800;

            letter-spacing: -0.7px;
        }

        .form-heading p {
            color: var(--muted);

            font-size: 12px;
            line-height: 1.5;
        }

        /* =====================================================
           GLOBAL ERROR
        ====================================================== */

        .alert-error {
            margin-bottom: 14px;

            padding: 10px 12px;

            border: 1px solid #fecaca;

            border-radius: 8px;

            background: #fef2f2;

            color: #b91c1c;

            font-size: 11px;
            line-height: 1.5;
        }

        .alert-error ul {
            padding-left: 16px;
        }

        .alert-error li + li {
            margin-top: 3px;
        }

        /* =====================================================
           FORM ROW
        ====================================================== */

        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 14px;
        }

        /* =====================================================
           FORM GROUP
        ====================================================== */

        .form-group {
            margin-bottom: 13px;
        }

        /* =====================================================
           LABEL
        ====================================================== */

        .form-label {
            display: block;

            margin-bottom: 6px;

            color: #39333b;

            font-size: 12px;
            font-weight: 600;
        }

        .optional {
            color: #aaa3ad;

            font-size: 10px;
            font-weight: 400;
        }

        /* =====================================================
           INPUT WRAPPER
        ====================================================== */

        .input-wrapper {
            position: relative;

            width: 100%;
        }

        /* =====================================================
           INPUT ICON
        ====================================================== */

        .input-icon {
            position: absolute;

            top: 50%;
            left: 13px;

            transform: translateY(-50%);

            color: #968e99;

            font-size: 15px;

            pointer-events: none;

            z-index: 2;
        }

        /* =====================================================
           FORM CONTROL
        ====================================================== */

        .form-control {
            width: 100%;
            height: 44px;

            padding: 0 40px 0 39px;

            border: 1px solid var(--border);

            border-radius: var(--radius);

            outline: none;

            background: #ffffff;

            color: var(--text);

            font-size: 12px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .form-control::placeholder {
            color: #aaa3ad;
        }

        .form-control:hover {
            border-color: #d4cdd6;
        }

        .form-control:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(127, 0, 121, 0.08);
        }

        .form-control:disabled {
            background: #f7f5f8;

            cursor: not-allowed;
        }

        /* Invalid */

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .form-control.is-invalid:focus {
            border-color: var(--danger);

            box-shadow:
                0 0 0 3px rgba(220, 38, 38, 0.08);
        }

        /* =====================================================
           PASSWORD TOGGLE
        ====================================================== */

        .password-toggle {
            position: absolute;

            top: 50%;
            right: 8px;

            width: 30px;
            height: 30px;

            transform: translateY(-50%);

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;

            background: transparent;

            color: #8c8490;

            cursor: pointer;

            font-size: 15px;

            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .password-toggle:focus {
            outline: none;
        }

        .password-toggle:focus-visible {
            border-radius: 6px;

            outline: 2px solid rgba(127, 0, 121, 0.18);
        }

        /* =====================================================
           FIELD ERROR
        ====================================================== */

        .field-error {
            margin-top: 5px;

            color: var(--danger);

            font-size: 10px;
            line-height: 1.4;
        }

        /* =====================================================
           TERMS
        ====================================================== */

        .form-check {
            display: flex;
            align-items: flex-start;

            gap: 8px;

            margin: 3px 0 16px;

            color: var(--muted);

            font-size: 10px;
            line-height: 1.5;

            cursor: pointer;
        }

        .form-check input {
            width: 14px;
            height: 14px;

            flex-shrink: 0;

            margin-top: 1px;

            accent-color: var(--primary);

            cursor: pointer;
        }

        .form-check a {
            color: var(--primary);

            font-weight: 600;
        }

        .form-check a:hover {
            text-decoration: underline;
        }

        /* =====================================================
           REGISTER BUTTON
        ====================================================== */

        .btn-register {
            width: 100%;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            border: 0;

            border-radius: 9px;

            background: var(--primary);

            color: #ffffff;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-register:hover {
            background: var(--primary-dark);

            transform: translateY(-1px);

            box-shadow:
                0 6px 16px rgba(127, 0, 121, 0.18);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register:focus-visible {
            outline: 3px solid rgba(127, 0, 121, 0.18);

            outline-offset: 2px;
        }

        .btn-register i {
            font-size: 13px;
        }

        /* =====================================================
           LOGIN LINK
        ====================================================== */

        .login-link {
            margin-top: 17px;

            color: var(--muted);

            font-size: 11px;

            text-align: center;
        }

        .login-link a {
            color: var(--primary);

            font-weight: 700;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* =====================================================
           FORM FOOTER
        ====================================================== */

        .form-bottom {
            margin-top: 18px;

            color: #aaa3ad;

            font-size: 9px;

            text-align: center;
        }

        /* =====================================================
           TABLET
        ====================================================== */

        @media (max-width: 950px) {

            .brand-panel {
                width: 38%;

                padding: 30px;
            }

            .form-panel {
                width: 62%;

                padding: 25px;
            }

            .brand-content h1 {
                font-size: 32px;
            }

            .brand-logo img {
                width: 32px;
                height: 32px;
            }

            .brand-logo span {
                font-size: 17px;
            }
        }

        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 720px) {

            .register-wrapper {
                display: block;
            }

            /* Hide desktop branding */

            .brand-panel {
                display: none;
            }

            /* Full width form */

            .form-panel {
                width: 100%;
                min-height: 100vh;

                align-items: flex-start;

                padding: 28px 18px;
            }

            .register-card {
                max-width: 460px;

                margin: 0 auto;
            }

            /* Show mobile logo */

            .mobile-logo {
                display: block;
            }

            .form-heading {
                margin-bottom: 20px;
            }

            .form-heading h2 {
                font-size: 24px;
            }

            .form-heading p {
                font-size: 11px;
            }
        }

        /* =====================================================
           SMALL MOBILE
        ====================================================== */

        @media (max-width: 500px) {

            .form-row {
                grid-template-columns: 1fr;

                gap: 0;
            }

            .form-group {
                margin-bottom: 13px;
            }

            .form-panel {
                padding: 25px 16px;
            }

            .form-heading h2 {
                font-size: 23px;
            }
        }

        /* =====================================================
           VERY SMALL MOBILE
        ====================================================== */

        @media (max-width: 360px) {

            .form-panel {
                padding: 22px 14px;
            }

            .mobile-logo {
                margin-bottom: 18px;
            }

            .mobile-logo img {
                width: 28px;
                height: 28px;
            }

            .mobile-logo span {
                font-size: 17px;
            }

            .form-heading h2 {
                font-size: 22px;
            }

            .form-control,
            .btn-register {
                height: 43px;
            }
        }

        /* =====================================================
           REDUCED MOTION
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    {{-- =====================================================
         LEFT BRAND PANEL
    ====================================================== --}}

    <aside class="brand-panel">

        {{-- LOGO --}}
        <div class="brand-logo">

            <a
                href="{{ url('/') }}"
                class="brand-logo-link"
                aria-label="Tring.id"
            >

                <img
                    src="{{ asset('tr.png') }}"
                    alt="Tring.id"
                >

                <span>
                    Tring.id
                </span>

            </a>

        </div>


        {{-- =================================================
             BRAND CONTENT
        ================================================== --}}

        <div class="brand-content">

            {{-- LABEL --}}
            <div class="brand-label">

                <i
                    class="bi bi-stars"
                    aria-hidden="true"
                ></i>

                <span>
                    Tring.id
                </span>

            </div>


            {{-- HEADING --}}
            <h1>
                Semua kebutuhan
                <span>dalam satu akun.</span>
            </h1>


            {{-- DESCRIPTION --}}
            <p>
                Daftar sekarang dan nikmati berbagai layanan
                digital Tring.id dengan mudah, cepat, dan praktis.
            </p>


            {{-- =================================================
                 BENEFITS
            ================================================== --}}

            <div class="brand-benefits">

                {{-- Benefit 1 --}}
                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i
                            class="bi bi-lightning-charge-fill"
                            aria-hidden="true"
                        ></i>

                    </div>

                    <span>
                        Transaksi cepat
                    </span>

                </div>


                {{-- Benefit 2 --}}
                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i
                            class="bi bi-controller"
                            aria-hidden="true"
                        ></i>

                    </div>

                    <span>
                        Top up game favorit
                    </span>

                </div>


                {{-- Benefit 3 --}}
                <div class="benefit-item">

                    <div class="benefit-icon">

                        <i
                            class="bi bi-gift"
                            aria-hidden="true"
                        ></i>

                    </div>

                    <span>
                        Program referral
                    </span>

                </div>

            </div>

        </div>


        {{-- BRAND FOOTER --}}
        <div class="brand-footer">
            © {{ date('Y') }} Tring.id. All rights reserved.
        </div>

    </aside>


    {{-- =====================================================
         RIGHT FORM PANEL
    ====================================================== --}}

    <main class="form-panel">

        <div class="register-card">

            {{-- =================================================
                 MOBILE LOGO
            ================================================== --}}

            <div class="mobile-logo">

                <a
                    href="{{ url('/') }}"
                    class="mobile-logo-link"
                    aria-label="Tring.id"
                >

                    <img
                        src="{{ asset('tr.png') }}"
                        alt="Tring.id"
                    >

                    <span>
                        Tring.id
                    </span>

                </a>

            </div>


            {{-- =================================================
                 FORM HEADING
            ================================================== --}}

            <div class="form-heading">

                <h2>
                    Buat Akun
                </h2>

                <p>
                    Lengkapi data berikut untuk membuat akun Tring.id.
                </p>

            </div>


            {{-- =================================================
                 GLOBAL ERROR
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="alert-error"
                    role="alert"
                >

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- =================================================
                 REGISTER FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('register.store') }}"
                autocomplete="on"
            >

                @csrf


                {{-- =================================================
                     NAME + WHATSAPP
                ================================================== --}}

                <div class="form-row">

                    {{-- NAME --}}
                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label"
                        >
                            Nama
                        </label>


                        <div class="input-wrapper">

                            <i
                                class="bi bi-person input-icon"
                                aria-hidden="true"
                            ></i>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama lengkap"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                maxlength="255"
                                required
                                autofocus
                            >

                        </div>


                        @error('name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- WHATSAPP --}}
                    <div class="form-group">

                        <label
                            for="whatsapp"
                            class="form-label"
                        >
                            WhatsApp
                        </label>


                        <div class="input-wrapper">

                            <i
                                class="bi bi-whatsapp input-icon"
                                aria-hidden="true"
                            ></i>

                            <input
                                type="tel"
                                id="whatsapp"
                                name="whatsapp"
                                class="form-control @error('whatsapp') is-invalid @enderror"
                                placeholder="081234567890"
                                value="{{ old('whatsapp') }}"
                                autocomplete="tel"
                                inputmode="tel"
                                maxlength="20"
                                required
                            >

                        </div>


                        @error('whatsapp')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- =================================================
                     EMAIL + PASSWORD
                ================================================== --}}

                <div class="form-row">

                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>


                        <div class="input-wrapper">

                            <i
                                class="bi bi-envelope input-icon"
                                aria-hidden="true"
                            ></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="nama@email.com"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                maxlength="255"
                                required
                            >

                        </div>


                        @error('email')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- PASSWORD --}}
                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>


                        <div class="input-wrapper">

                            <i
                                class="bi bi-lock input-icon"
                                aria-hidden="true"
                            ></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Minimal 8 karakter"
                                autocomplete="new-password"
                                minlength="8"
                                required
                            >


                            {{-- PASSWORD TOGGLE --}}
                            <button
                                type="button"
                                class="password-toggle"
                                id="passwordToggle"
                                aria-label="Tampilkan password"
                                aria-pressed="false"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="passwordIcon"
                                    aria-hidden="true"
                                ></i>

                            </button>

                        </div>


                        @error('password')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- =================================================
                     REFERRAL CODE
                ================================================== --}}

                <div class="form-group">

                    <label
                        for="referral_code"
                        class="form-label"
                    >

                        Kode Referral

                        <span class="optional">
                            Opsional
                        </span>

                    </label>


                    <div class="input-wrapper">

                        <i
                            class="bi bi-gift input-icon"
                            aria-hidden="true"
                        ></i>

                        <input
                            type="text"
                            id="referral_code"
                            name="referral_code"
                            class="form-control @error('referral_code') is-invalid @enderror"
                            placeholder="Masukkan kode referral"
                            value="{{ old('referral_code', request('ref')) }}"
                            maxlength="50"
                            autocomplete="off"
                            autocapitalize="characters"
                        >

                    </div>


                    @error('referral_code')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TERMS & PRIVACY
                ================================================== --}}

                <label class="form-check">

                    <input
                        type="checkbox"
                        name="terms"
                        value="1"
                        required
                        {{ old('terms') ? 'checked' : '' }}
                    >

                    <span>

                        Saya setuju dengan

                        <a
                            href="{{ url('/syarat-ketentuan') }}"
                            target="_blank"
                            rel="noopener"
                        >
                            Syarat &amp; Ketentuan
                        </a>

                        dan

                        <a
                            href="{{ url('/kebijakan-privasi') }}"
                            target="_blank"
                            rel="noopener"
                        >
                            Kebijakan Privasi
                        </a>.

                    </span>

                </label>


                {{-- =================================================
                     REGISTER BUTTON
                ================================================== --}}

                <button
                    type="submit"
                    class="btn-register"
                >

                    <span>
                        Buat Akun
                    </span>

                    <i
                        class="bi bi-arrow-right"
                        aria-hidden="true"
                    ></i>

                </button>

            </form>


            {{-- =================================================
                 LOGIN LINK
            ================================================== --}}

            <div class="login-link">

                <span>
                    Sudah punya akun?
                </span>

                <a href="{{ route('login') }}">
                    Masuk
                </a>

            </div>


            {{-- =================================================
                 FOOTER
            ================================================== --}}

            <div class="form-bottom">
                © {{ date('Y') }} Tring.id
            </div>

        </div>

    </main>

</div>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const passwordInput =
            document.getElementById('password');

        const passwordToggle =
            document.getElementById('passwordToggle');

        const passwordIcon =
            document.getElementById('passwordIcon');


        if (
            passwordInput &&
            passwordToggle &&
            passwordIcon
        ) {

            passwordToggle.addEventListener('click', function () {

                const isPassword =
                    passwordInput.type === 'password';


                passwordInput.type =
                    isPassword
                        ? 'text'
                        : 'password';


                passwordIcon.classList.toggle(
                    'bi-eye',
                    !isPassword
                );


                passwordIcon.classList.toggle(
                    'bi-eye-slash',
                    isPassword
                );


                passwordToggle.setAttribute(
                    'aria-label',
                    isPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );


                passwordToggle.setAttribute(
                    'aria-pressed',
                    isPassword
                        ? 'true'
                        : 'false'
                );

            });

        }

    });
</script>

</body>
</html>
