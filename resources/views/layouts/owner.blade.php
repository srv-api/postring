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
        @yield('title', 'Tring POS')
    </title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('tring.png') }}"
    >

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

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

            --white: #FFFFFF;
            --black: #171717;

            --gray-1: #404040;
            --gray-2: #737373;
            --gray-3: #A3A3A3;

            --border: #E5E5E5;
            --background: #F7F7F8;

            --success: #16A34A;
            --warning: #D97706;
            --danger: #DC2626;

            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--black);
            min-height: 100vh;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .app {
            min-height: 100vh;
        }

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;

            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            padding: 30px 32px;
        }

        /* =====================================================
           COMMON
        ====================================================== */

        .alert-success {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 12px 15px;
            margin-bottom: 22px;

            border-radius: 9px;

            background: #F0FDF4;
            border: 1px solid #BBF7D0;

            color: #166534;

            font-size: 11px;
        }

        .alert-success i {
            font-size: 15px;
        }

        /* =====================================================
           WELCOME
        ====================================================== */

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .welcome p {
            margin-top: 7px;

            color: var(--gray-2);

            font-size: 12px;
        }

        /* =====================================================
           STATISTICS
        ====================================================== */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 16px;

            margin-bottom: 25px;
        }

        .stat-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 12px;

            padding: 19px;

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 25px rgba(0, 0, 0, .05);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 16px;
        }

        .stat-icon {
            width: 37px;
            height: 37px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 16px;
        }

        .stat-title {
            color: var(--gray-3);

            font-size: 10px;
            font-weight: 600;
        }

        .stat-value {
            color: var(--gray-1);

            font-size: 21px;
            font-weight: 800;

            letter-spacing: -.5px;
        }

        .stat-note {
            margin-top: 5px;

            color: var(--gray-3);

            font-size: 9px;
        }

        /* =====================================================
           GRID
        ====================================================== */

        .dashboard-grid {
            display: grid;

            grid-template-columns:
                minmax(0, 1.5fr)
                minmax(280px, 1fr);

            gap: 18px;
        }

        .card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 12px;

            overflow: hidden;
        }

        .card-header {
            min-height: 60px;

            padding: 15px 18px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            border-bottom: 1px solid var(--border);
        }

        .card-title {
            font-size: 12px;
            font-weight: 800;
        }

        .card-subtitle {
            margin-top: 4px;

            color: var(--gray-3);

            font-size: 9px;
        }

        .card-link {
            color: var(--primary);

            font-size: 10px;
            font-weight: 700;
        }

        /* =====================================================
           QUICK ACTION
        ====================================================== */

        .quick-actions {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;

            padding: 18px;
        }

        .quick-action {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 13px;

            border: 1px solid var(--border);
            border-radius: 9px;

            transition:
                border-color .2s ease,
                background .2s ease;
        }

        .quick-action:hover {
            border-color: rgba(127, 0, 121, .25);
            background: var(--primary-light);
        }

        .quick-action-icon {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 8px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 15px;
        }

        .quick-action-title {
            font-size: 10px;
            font-weight: 700;
        }

        .quick-action-title a {
            color: inherit;
            text-decoration: none;
        }

        .quick-action-title a:hover {
            color: var(--primary);
        }

        .quick-action-description {
            margin-top: 3px;

            color: var(--gray-3);

            font-size: 8px;
        }

        /* =====================================================
           INFORMATION
        ====================================================== */

        .info-list {
            padding: 8px 18px 18px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 12px 0;

            border-bottom: 1px solid #F1F1F1;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--gray-3);
            font-size: 9px;
        }

        .info-value {
            color: var(--gray-1);

            font-size: 10px;
            font-weight: 700;

            text-align: right;
        }

        .status {
            display: inline-flex;
            align-items: center;

            gap: 5px;

            padding: 4px 8px;

            border-radius: 20px;

            background: #F0FDF4;
            color: var(--success);

            font-size: 8px;
            font-weight: 700;
        }

        .status::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: currentColor;
        }

        /* =====================================================
           MOBILE
        ====================================================== */

        .mobile-header {
            display: none;
        }

        .mobile-brand {
            display: flex;
            align-items: center;
            gap: 8px;

            color: var(--primary);

            font-size: 17px;
            font-weight: 800;
        }

        .mobile-brand img {
            width: 30px;
            height: 30px;

            object-fit: contain;
        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1100px) {

            .stats {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {

            :root {
                --sidebar-width: 0px;
            }

            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
            }

            .mobile-header {
                display: flex;

                height: 60px;

                align-items: center;
                justify-content: space-between;

                padding: 0 20px;

                background: var(--white);

                border-bottom: 1px solid var(--border);
            }

            .topbar {
                position: static;
                padding: 0 20px;
            }

            .content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 550px) {

            .topbar {
                height: auto;
                padding: 17px 20px;
            }

            .user-info {
                display: none;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .welcome h2 {
                font-size: 21px;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 22px 15px;
            }
        }

        @stack('styles')
    </style>
</head>

<body>

<div class="app">

    {{-- SIDEBAR --}}
    @include('components.owner.sidebar')

    {{-- MAIN --}}
    <main class="main">

        {{-- MOBILE HEADER --}}
        @include('components.owner.mobile-header')

        {{-- TOPBAR --}}
        @include('components.owner.topbar')

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        @include('components.owner.footer')

    </main>

</div>

@stack('scripts')

</body>
</html>
