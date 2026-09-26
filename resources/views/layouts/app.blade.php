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

    <title>
        @yield('title', 'Tring.id')
    </title>

    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('tring.png') }}"
    >

    {{-- GOOGLE FONT --}}
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

    {{-- BOOTSTRAP ICON --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

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

            --radius: 16px;
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
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            height: 72px;
            background: var(--primary);
            color: var(--white);

            position: sticky;
            top: 0;

            z-index: 1000;

            box-shadow:
                0 3px 15px rgba(127, 0, 121, .12);
        }

        .header-container {
            max-width: 1240px;
            height: 100%;

            margin: auto;
            padding: 0 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* =========================
           LOGO
        ========================= */

        .logo {
            display: flex;
            align-items: center;

            gap: 10px;

            font-size: 22px;
            font-weight: 800;

            letter-spacing: -.8px;

            flex-shrink: 0;
        }

        .logo-box {
            width: 36px;
            height: 36px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .logo-box img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            padding: 5px;
        }

        /* =========================
           NAVIGATION
        ========================= */

        .navigation {
            display: flex;
            align-items: center;

            gap: 30px;

            margin-left: auto;
            margin-right: auto;
        }

        .navigation-item {
            position: relative;
        }

        .navigation-link {
            display: flex;
            align-items: center;

            gap: 6px;

            color: rgba(255, 255, 255, .72);

            font-size: 13px;
            font-weight: 600;

            padding: 28px 0;

            white-space: nowrap;

            transition: color .2s ease;
        }

        .navigation-link:hover,
        .navigation-link.active {
            color: var(--white);
        }

        .navigation-link i {
            font-size: 10px;

            transition:
                transform .2s ease;
        }

        .navigation-item:hover
        .navigation-link i {
            transform: rotate(180deg);
        }

        /* =========================
           DROPDOWN
        ========================= */

        .navigation-dropdown {
            position: absolute;

            top: calc(100% - 8px);
            left: 50%;

            transform:
                translate(-50%, 10px);

            width: 270px;

            padding: 8px;

            background: var(--white);

            border: 1px solid var(--border);

            border-radius: 14px;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, .12);

            opacity: 0;
            visibility: hidden;

            pointer-events: none;

            transition:
                opacity .2s ease,
                transform .2s ease,
                visibility .2s ease;
        }

        .navigation-item:hover
        .navigation-dropdown {
            opacity: 1;

            visibility: visible;

            pointer-events: auto;

            transform:
                translate(-50%, 0);
        }

        /* =========================
           DROPDOWN LINK
        ========================= */

        .navigation-dropdown a {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 12px;

            border-radius: 10px;

            color: var(--gray-1);

            font-size: 12px;
            font-weight: 600;

            transition:
                background .2s ease,
                color .2s ease;
        }

        .navigation-dropdown a:hover,
        .navigation-dropdown a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* =========================
           DROPDOWN ICON
        ========================= */

        .dropdown-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--primary-light);

            color: var(--primary);

            font-size: 18px;
        }

        .navigation-dropdown a:hover
        .dropdown-icon,

        .navigation-dropdown a.active
        .dropdown-icon {
            background: var(--white);
        }

        /* =========================
           DROPDOWN CONTENT
        ========================= */

        .dropdown-content {
            display: flex;

            flex-direction: column;

            gap: 4px;
        }

        .dropdown-title {
            font-size: 12px;
            font-weight: 700;

            color: inherit;
        }

        .dropdown-description {
            color: var(--gray-3);

            font-size: 10px;
            font-weight: 400;

            line-height: 1.5;
        }

        /* =========================
           HEADER RIGHT
        ========================= */

        .header-right {
            display: flex;
            align-items: center;

            gap: 10px;

            flex-shrink: 0;
        }


        /* =========================
           DOWNLOAD APP BUTTON
        ========================= */

        .download-app-button {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            background: var(--white);

            color: var(--primary);

            border: 1px solid var(--white);

            padding: 9px 13px;

            border-radius: 9px;

            font-size: 11px;
            font-weight: 700;

            white-space: nowrap;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease;
        }

        .download-app-button:hover {
            background: var(--primary-light);

            color: var(--primary-dark);

            transform:
                translateY(-1px);
        }

        .download-app-button i {
            font-size: 14px;
        }

        /* =========================
           PROFILE
        ========================= */

        .profile {
            width: 35px;
            height: 35px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, .14);

            color: var(--white);

            border:
                1px solid rgba(255, 255, 255, .25);

            display: flex;
            align-items: center;
            justify-content: center;

            transition:
                background .2s ease;

            flex-shrink: 0;
        }

        .profile:hover {
            background:
                rgba(255, 255, 255, .22);
        }

        .profile i {
            font-size: 16px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: var(--white);

            border-top:
                1px solid var(--border);

            padding:
                25px 24px;
        }

        .footer-container {
            max-width: 1240px;

            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .footer-logo {
            display: flex;
            align-items: center;

            gap: 8px;

            color: var(--primary);

            font-size: 15px;
            font-weight: 800;
        }

        .footer-logo-image {
            width: 26px;
            height: 26px;

            object-fit: contain;
        }

        .footer-copy {
            margin-top: 5px;

            color: var(--gray-3);

            font-size: 9px;
        }

        .footer-links {
            display: flex;

            gap: 20px;
        }

        .footer-links a {
            color: var(--gray-2);

            font-size: 9px;

            transition:
                color .2s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .navigation {
                gap: 20px;
            }

            .download-app-button span {
                display: none;
            }

            .download-app-button {
                width: 35px;
                height: 35px;

                padding: 0;
            }
        }

        @media (max-width: 900px) {

            .navigation {
                display: none;
            }
        }

        @media (max-width: 600px) {

            .header {
                height: 65px;
            }

            .header-container {
                padding: 0 16px;
            }

            .logo {
                font-size: 19px;
            }

            .logo-box {
                width: 32px;
                height: 32px;
            }

            .header-right {
                gap: 7px;
            }

            /* DOWNLOAD */

            .download-app-button span {
                display: none;
            }

            .download-app-button {
                width: 35px;
                height: 35px;

                padding: 0;

                justify-content: center;
            }

            .download-app-button i {
                font-size: 15px;
            }

            /* PROFILE */

            .profile {
                width: 35px;
                height: 35px;
            }

            /* FOOTER */

            .footer-container {
                flex-direction: column;

                align-items: flex-start;
            }

            .footer-links {
                flex-wrap: wrap;

                gap: 14px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


    {{-- =========================
         HEADER
    ========================= --}}

    <header class="header">

        <div class="header-container">


            {{-- =========================
                 LOGO
            ========================= --}}

            <a
                href="{{ url('/') }}"
                class="logo"
            >

                <div class="logo-box">

                    <img
                        src="{{ asset('tr.png') }}"
                        alt="Tring.id Logo"
                    >

                </div>

                Tring

            </a>


            {{-- =========================
                 NAVIGATION
            ========================= --}}

            <nav class="navigation">


                {{-- =========================
                     PERSONAL
                ========================= --}}

                <div class="navigation-item">

                    <a
                        href="#"
                        class="navigation-link
                        {{ request()->routeIs('topup.*') || request()->routeIs('wallet.*') ? 'active' : '' }}"
                    >

                        Personal

                        <i class="bi bi-chevron-down"></i>

                    </a>


                    {{-- PERSONAL DROPDOWN --}}

                    <div class="navigation-dropdown">


                        {{-- TRING GAME --}}

                        <a
                            href="#"
                            class="{{ request()->routeIs('topup.*') ? 'active' : '' }}"
                        >

                            <div class="dropdown-icon">

                                <i class="bi bi-controller"></i>

                            </div>


                            <div class="dropdown-content">

                                <span class="dropdown-title">
                                    Tring Game
                                </span>

                                <span class="dropdown-description">
                                    Top up game favoritmu
                                </span>

                            </div>

                        </a>


                        {{-- TRING WALLET --}}

                        <a
                            href="#"
                            class="{{ request()->routeIs('wallet.*') ? 'active' : '' }}"
                        >

                            <div class="dropdown-icon">

                                <i class="bi bi-wallet2"></i>

                            </div>


                            <div class="dropdown-content">

                                <span class="dropdown-title">
                                    Tring Wallet
                                </span>

                                <span class="dropdown-description">
                                    Dompet digital Tring.id
                                </span>

                            </div>

                        </a>


                    </div>

                </div>


                {{-- =========================
                     BISNIS
                ========================= --}}

                <div class="navigation-item">

                    <a
                        href="#"
                        class="navigation-link
                        {{ request()->routeIs('pos.*') ? 'active' : '' }}"
                    >

                        Bisnis

                        <i class="bi bi-chevron-down"></i>

                    </a>


                    {{-- BISNIS DROPDOWN --}}

                    <div class="navigation-dropdown">


                        {{-- TRING POS --}}

                        <a
                            href="#"
                            class="{{ request()->routeIs('pos.*') ? 'active' : '' }}"
                        >

                            <div class="dropdown-icon">

                                <i class="bi bi-shop"></i>

                            </div>


                            <div class="dropdown-content">

                                <span class="dropdown-title">
                                    POINT OF SALE
                                </span>

                                <span class="dropdown-description">
                                    Kasir digital untuk bisnis
                                </span>

                            </div>

                        </a>


                    </div>

                </div>


            </nav>


            {{-- =========================
                 HEADER RIGHT
            ========================= --}}

            <div class="header-right">


                {{-- DOWNLOAD APLIKASI --}}

                <a
                    href="#"
                    class="download-app-button"
                    aria-label="Download Aplikasi"
                    title="Download Aplikasi"
                >

                    <i class="bi bi-google-play"></i>

                    <span>
                        Download Aplikasi
                    </span>

                </a>


                {{-- PROFILE --}}

<a
                    href="{{ route('login') }}"
                    class="profile"
                    aria-label="Login"
                    title="Login"
                >
                    <i class="bi bi-person"></i>

                </a>


            </div>

        </div>

    </header>


    {{-- =========================
         CONTENT
    ========================= --}}

    @yield('content')


    {{-- =========================
         FOOTER
    ========================= --}}

    <footer class="footer">

        <div class="footer-container">


            {{-- FOOTER BRAND --}}

            <div>

                <div class="footer-logo">

                    <img
                        src="{{ asset('tring.png') }}"
                        alt="Tring.id Logo"
                        class="footer-logo-image"
                    >

                    <span>
                        Tring.id
                    </span>

                </div>


                <div class="footer-copy">

                    © {{ date('Y') }}
                    Tring.id.
                    All rights reserved.

                </div>

            </div>


            {{-- FOOTER LINKS --}}

            <div class="footer-links">

                <a href="#">
                    Tentang Kami
                </a>

                <a href="#">
                    Blog Tring
                </a>

                <a href="#">
                    Kebijakan Privasi
                </a>

                <a href="#">
                    Syarat & Ketentuan
                </a>

            </div>


        </div>

    </footer>


    @stack('scripts')


</body>

</html>

