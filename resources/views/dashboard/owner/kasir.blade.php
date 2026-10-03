<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kasir - Tring POS</title>

    <link rel="icon" href="{{ asset('tring.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --primary: #7F0079;
            --primary-dark: #650061;
            --primary-light: #F8EAF7;
            --text: #211F24;
            --muted: #77717C;
            --border: #ECE8EF;
            --surface: #FFFFFF;
            --background: #F7F6F9;
            --green: #16834A;
            --red: #D92D20;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: var(--background);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        button {
            border: 0;
        }

        .app-header {
            height: 68px;
            width: 100%;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            object-fit: contain;
        }

        .brand-info {
            display: flex;
            flex-direction: column;
            line-height: 1.15;
        }

        .brand-name {
            color: var(--primary);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .brand-caption {
            color: var(--muted);
            font-size: 10px;
            font-weight: 500;
            margin-top: 3px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notification-button {
            width: 38px;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 17px;
            transition: .2s ease;
        }

        .notification-button:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: #e2c6df;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
        }

        .user-detail {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .user-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
        }

        .user-role {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        .main-wrapper {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 390px;
            min-height: calc(100vh - 68px);
        }

        .catalog {
            padding: 28px;
            min-width: 0;
        }

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.7px;
            color: var(--text);
        }

        .page-subtitle {
            color: var(--muted);
            margin-top: 7px;
            font-size: 13px;
        }

        .date-label {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
            padding-top: 5px;
        }

        .search-row {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
        }

        .search-box {
            position: relative;
            flex: 1;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 17px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: #fff;
            outline: none;
            padding: 0 15px 0 43px;
            font-size: 13px;
            color: var(--text);
            transition: .2s ease;
        }

        .search-box input::placeholder {
            color: #aaa4ad;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(127, 0, 121, .08);
        }

        .scan-button {
            height: 46px;
            padding: 0 17px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: #fff;
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: .2s ease;
        }

        .scan-button:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
        }

        .categories {
            display: flex;
            align-items: center;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 5px;
            margin-bottom: 24px;
            scrollbar-width: none;
        }

        .categories::-webkit-scrollbar {
            display: none;
        }

        .category-button {
            flex: 0 0 auto;
            padding: 9px 14px;
            border-radius: 9px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s ease;
        }

        .category-button:hover {
            border-color: #d8b5d5;
            color: var(--primary);
        }

        .category-button.active {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
        }

        .product-count {
            font-size: 11px;
            color: var(--muted);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .product-card {
            width: 100%;
            min-width: 0;
            text-align: left;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 10px;
            cursor: pointer;
            transition: .2s ease;
            overflow: hidden;
        }

        .product-card:hover:not(:disabled) {
            transform: translateY(-2px);
            border-color: #d6acd3;
            box-shadow: 0 8px 25px rgba(50, 20, 50, .07);
        }

        .product-card:disabled {
            opacity: .55;
            cursor: not-allowed;
        }

        .product-image {
            height: 135px;
            width: 100%;
            border-radius: 10px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .product-image > i {
            color: var(--primary);
            font-size: 40px;
        }

        .stock-badge {
            position: absolute;
            right: 8px;
            top: 8px;
            background: rgba(255,255,255,.94);
            color: var(--green);
            border-radius: 6px;
            padding: 4px 7px;
            font-size: 9px;
            font-weight: 700;
        }

        .product-name {
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
            line-height: 1.35;
            min-height: 35px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-category {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .product-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: 11px;
        }

        .product-price {
            color: var(--primary);
            font-size: 13px;
            font-weight: 800;
        }

        .add-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }

        .empty-products {
            grid-column: 1 / -1;
            min-height: 250px;
            background: #fff;
            border: 1px dashed var(--border);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: 13px;
        }

        .cart-panel {
            background: #fff;
            border-left: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 68px);
            position: sticky;
            top: 68px;
            height: calc(100vh - 68px);
        }

        .cart-header {
            padding: 22px 20px 16px;
            border-bottom: 1px solid var(--border);
        }

        .cart-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cart-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 16px;
            font-weight: 800;
        }

        .cart-title i {
            color: var(--primary);
            font-size: 18px;
        }

        .cart-count {
            min-width: 22px;
            height: 22px;
            border-radius: 7px;
            background: var(--primary-light);
            color: var(--primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 6px;
            font-size: 10px;
            font-weight: 800;
        }

        .clear-cart {
            background: transparent;
            color: var(--red);
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .clear-cart:hover {
            text-decoration: underline;
        }

        .customer-field {
            margin-top: 15px;
            position: relative;
        }

        .customer-field i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .customer-field input {
            width: 100%;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            padding: 0 12px 0 38px;
            font-size: 12px;
            color: var(--text);
        }

        .customer-field input:focus {
            border-color: var(--primary);
        }

        .cart-content {
            flex: 1;
            overflow-y: auto;
            padding: 8px 20px 18px;
        }

        .empty-cart {
            min-height: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--muted);
        }

        .empty-cart-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 13px;
        }

        .empty-cart strong {
            color: var(--text);
            font-size: 13px;
            margin-bottom: 5px;
        }

        .empty-cart span {
            font-size: 11px;
        }

        .cart-item {
            padding: 15px 0;
            border-bottom: 1px solid var(--border);
        }

        .cart-item-main {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .cart-item-icon {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            border-radius: 9px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-item-info {
            min-width: 0;
            flex: 1;
        }

        .cart-item-name {
            color: var(--text);
            font-size: 12px;
            font-weight: 700;
            line-height: 1.35;
            padding-right: 5px;
        }

        .cart-item-price {
            color: var(--muted);
            font-size: 10px;
            margin-top: 4px;
        }

        .cart-item-delete {
            width: 26px;
            height: 26px;
            background: transparent;
            color: #a9a2ab;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
        }

        .cart-item-delete:hover {
            background: #fff0ef;
            color: var(--red);
        }

        .cart-item-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 11px;
            padding-left: 48px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }

        .quantity-control button {
            width: 28px;
            height: 27px;
            background: #fff;
            color: var(--primary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-control button:hover {
            background: var(--primary-light);
        }

        .quantity-value {
            min-width: 28px;
            text-align: center;
            font-size: 11px;
            font-weight: 700;
        }

        .cart-item-total {
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
        }

        .cart-summary {
            border-top: 1px solid var(--border);
            padding: 18px 20px 20px;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .summary-label {
            color: var(--muted);
        }

        .summary-value {
            color: var(--text);
            font-weight: 600;
        }

        .discount-row {
            display: flex;
            gap: 7px;
            margin-bottom: 15px;
        }

        .discount-input {
            height: 37px;
            flex: 1;
            min-width: 0;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            padding: 0 11px;
            font-size: 11px;
        }

        .discount-input:focus {
            border-color: var(--primary);
        }

        .discount-button {
            height: 37px;
            padding: 0 12px;
            border-radius: 8px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .discount-button:hover {
            background: #efd7ec;
        }

        .total-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 15px 0 17px;
        }

        .total-label {
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
        }

        .total-value {
            color: var(--primary);
            font-size: 19px;
            font-weight: 800;
        }

        .payment-button {
            width: 100%;
            height: 46px;
            border-radius: 10px;
            background: var(--primary);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: .2s ease;
        }

        .payment-button:hover:not(:disabled) {
            background: var(--primary-dark);
        }

        .payment-button:disabled {
            background: #d7d2d8;
            cursor: not-allowed;
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(25, 17, 27, .55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 500;
        }

        .modal-overlay.show {
            display: flex;
        }

        .payment-modal {
            width: 100%;
            max-width: 430px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 25px 70px rgba(0,0,0,.2);
            overflow: hidden;
        }

        .modal-header {
            padding: 19px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 16px;
            font-weight: 800;
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #f6f4f7;
            color: var(--muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .modal-body {
            padding: 20px;
        }

        .payment-total-box {
            background: var(--primary-light);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
            margin-bottom: 18px;
        }

        .payment-total-label {
            color: var(--muted);
            font-size: 11px;
        }

        .payment-total {
            color: var(--primary);
            font-size: 26px;
            font-weight: 800;
            margin-top: 4px;
        }

        .form-label {
            display: block;
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .payment-select,
        .cash-input {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            padding: 0 12px;
            background: #fff;
            color: var(--text);
            font-size: 12px;
        }

        .payment-select:focus,
        .cash-input:focus {
            border-color: var(--primary);
        }

        .cash-section {
            margin-top: 16px;
        }

        .change-box {
            margin-top: 10px;
            border-radius: 9px;
            background: #f7f6f9;
            padding: 11px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
        }

        .change-label {
            color: var(--muted);
        }

        .change-value {
            font-weight: 800;
            color: var(--green);
        }

        .modal-notice {
            margin-top: 14px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
            display: flex;
            gap: 7px;
        }

        .modal-notice i {
            color: var(--primary);
            font-size: 13px;
        }

        .modal-footer {
            padding: 0 20px 20px;
        }

        .confirm-payment {
            width: 100%;
            height: 44px;
            border-radius: 9px;
            background: var(--primary);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .confirm-payment:hover {
            background: var(--primary-dark);
        }

        .toast {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 700;
            background: #211f24;
            color: #fff;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 11px;
            font-weight: 600;
            box-shadow: 0 12px 35px rgba(0,0,0,.18);
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            transition: .25s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 1200px) {
            .main-wrapper {
                grid-template-columns: minmax(0, 1fr) 350px;
            }

            .products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .main-wrapper {
                display: block;
            }

            .catalog {
                padding-bottom: 20px;
            }

            .cart-panel {
                position: static;
                height: auto;
                min-height: 500px;
                border-left: 0;
                border-top: 1px solid var(--border);
            }

            .cart-content {
                max-height: 500px;
            }

            .products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .app-header {
                padding: 0 16px;
            }

            .user-detail {
                display: none;
            }

            .header-right {
                gap: 9px;
            }

            .catalog {
                padding: 20px 16px;
            }

            .page-heading {
                margin-bottom: 18px;
            }

            .page-title {
                font-size: 21px;
            }

            .date-label {
                display: none;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .product-image {
                height: 115px;
            }

            .scan-button {
                padding: 0 13px;
            }

            .scan-button span {
                display: none;
            }

            .cart-header,
            .cart-content,
            .cart-summary {
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        @media (max-width: 560px) {
            .brand-caption {
                display: none;
            }

            .brand-name {
                font-size: 15px;
            }

            .brand-logo {
                width: 34px;
                height: 34px;
            }

            .search-row {
                gap: 7px;
            }

            .category-button {
                padding: 8px 11px;
            }

            .product-image {
                height: 105px;
            }

            .product-name {
                font-size: 12px;
            }

            .product-price {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

<header class="app-header">
    <div class="brand">
        <img
            src="{{ asset('tr.png') }}"
            alt="Tring POS"
            class="brand-logo"
        >

        <div class="brand-info">
            <div class="brand-name">TringPOS</div>
            <div class="brand-caption">Point of Sale</div>
        </div>
    </div>

    <div class="header-right">
        <button
            type="button"
            class="notification-button"
            title="Notifikasi"
        >
            <i class="bi bi-bell"></i>
        </button>

        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>

            <div class="user-detail">
                <div class="user-name">
                    {{ auth()->user()->name ?? 'User' }}
                </div>

                <div class="user-role">
                    Kasir
                </div>
            </div>
        </div>
    </div>
</header>

<main class="main-wrapper">

    <section class="catalog">

        <div class="page-heading">
            <div>
                <h1 class="page-title">Kasir</h1>

                <p class="page-subtitle">
                    Pilih produk untuk memulai transaksi.
                </p>
            </div>

            <div class="date-label" id="currentDate"></div>
        </div>

        <div class="search-row">
            <div class="search-box">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="productSearch"
                    placeholder="Cari nama produk atau kode..."
                    autocomplete="off"
                >
            </div>

            <button
                type="button"
                class="scan-button"
                id="scanButton"
            >
                <i class="bi bi-upc-scan"></i>
                <span>Scan</span>
            </button>
        </div>

        <div class="categories" id="categories">
            <button
                type="button"
                class="category-button active"
                data-category="Semua"
            >
                Semua Produk
            </button>

            @foreach ($categories as $category)
                <button
                    type="button"
                    class="category-button"
                    data-category="{{ $category }}"
                >
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <div class="section-heading">
            <div class="section-title">
                Daftar Produk
            </div>

            <div
                class="product-count"
                id="productCount"
            >
                0 produk
            </div>
        </div>

        <div
            class="products"
            id="products"
        ></div>

    </section>

    <aside class="cart-panel">

        <div class="cart-header">

            <div class="cart-title-row">

                <div class="cart-title">
                    <i class="bi bi-bag"></i>
                    <span>Keranjang</span>

                    <span
                        class="cart-count"
                        id="cartCount"
                    >
                        0
                    </span>
                </div>

                <button
                    type="button"
                    class="clear-cart"
                    id="clearCart"
                >
                    Kosongkan
                </button>

            </div>

            <div class="customer-field">
                <i class="bi bi-person"></i>

                <input
                    type="text"
                    id="customerName"
                    placeholder="Nama pelanggan (opsional)"
                    autocomplete="off"
                >
            </div>

        </div>

        <div
            class="cart-content"
            id="cartContent"
        ></div>

        <div class="cart-summary">

            <div class="summary-row">
                <span class="summary-label">
                    Subtotal
                </span>

                <span
                    class="summary-value"
                    id="subtotal"
                >
                    Rp0
                </span>
            </div>

            <div class="summary-row">
                <span class="summary-label">
                    Diskon
                </span>

                <span
                    class="summary-value"
                    id="discountDisplay"
                >
                    Rp0
                </span>
            </div>

            <div class="discount-row">
                <input
                    type="number"
                    class="discount-input"
                    id="discountInput"
                    min="0"
                    placeholder="Masukkan diskon"
                >

                <button
                    type="button"
                    class="discount-button"
                    id="discountButton"
                >
                    Terapkan
                </button>
            </div>

            <div class="total-row">
                <span class="total-label">
                    Total Pembayaran
                </span>

                <span
                    class="total-value"
                    id="grandTotal"
                >
                    Rp0
                </span>
            </div>

            <button
                type="button"
                class="payment-button"
                id="paymentButton"
                disabled
            >
                <i class="bi bi-credit-card"></i>
                Proses Pembayaran
            </button>

        </div>

    </aside>

</main>

<div
    class="modal-overlay"
    id="paymentModal"
>
    <div class="payment-modal">

        <div class="modal-header">
            <div class="modal-title">
                Pembayaran
            </div>

            <button
                type="button"
                class="modal-close"
                id="closePayment"
            >
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="modal-body">

            <div class="payment-total-box">
                <div class="payment-total-label">
                    Total Pembayaran
                </div>

                <div
                    class="payment-total"
                    id="paymentTotal"
                >
                    Rp0
                </div>
            </div>

            <label
                class="form-label"
                for="paymentMethod"
            >
                Metode Pembayaran
            </label>

            <select
                class="payment-select"
                id="paymentMethod"
            >
                <option value="Tunai">Tunai</option>
                <option value="QRIS">QRIS</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Kartu Debit">Kartu Debit</option>
            </select>

            <div
                class="cash-section"
                id="cashSection"
            >
                <label
                    class="form-label"
                    for="cashInput"
                >
                    Uang Diterima
                </label>

                <input
                    type="number"
                    class="cash-input"
                    id="cashInput"
                    min="0"
                    placeholder="Masukkan nominal uang"
                >

                <div class="change-box">
                    <span class="change-label">
                        Kembalian
                    </span>

                    <span
                        class="change-value"
                        id="changeValue"
                    >
                        Rp0
                    </span>
                </div>
            </div>

            <div class="modal-notice">
                <i class="bi bi-info-circle"></i>

                <span>
                    Pastikan metode pembayaran dan nominal sudah benar
                    sebelum menyelesaikan transaksi.
                </span>
            </div>

        </div>

        <div class="modal-footer">
            <button
                type="button"
                class="confirm-payment"
                id="confirmPayment"
            >
                Konfirmasi Pembayaran
            </button>
        </div>

    </div>
</div>

<div
    class="toast"
    id="toast"
></div>

<script>
    const products = @json($products);

    let cart = [];
    let activeCategory = 'Semua';
    let discount = 0;

    const productSearch = document.getElementById('productSearch');
    const productsContainer = document.getElementById('products');
    const productCount = document.getElementById('productCount');

    const cartContent = document.getElementById('cartContent');
    const cartCount = document.getElementById('cartCount');

    const subtotalElement = document.getElementById('subtotal');
    const discountDisplay = document.getElementById('discountDisplay');
    const grandTotal = document.getElementById('grandTotal');

    const discountInput = document.getElementById('discountInput');
    const paymentButton = document.getElementById('paymentButton');

    const paymentModal = document.getElementById('paymentModal');
    const paymentTotal = document.getElementById('paymentTotal');

    const paymentMethod = document.getElementById('paymentMethod');
    const cashSection = document.getElementById('cashSection');
    const cashInput = document.getElementById('cashInput');
    const changeValue = document.getElementById('changeValue');

    const customerName = document.getElementById('customerName');

    function rupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(Number(amount) || 0);
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[character]);
    }

    function getProductName(product) {
        return String(product.name ?? '');
    }

    function getProductCategory(product) {
        return String(product.category ?? 'Lainnya');
    }

    function getProductPrice(product) {
        return Number(product.selling_price ?? 0);
    }

    function getProductStock(product) {
        return Number(product.stock ?? 0);
    }

    function getProductSku(product) {
        return String(product.sku ?? '');
    }

    function getProductUnit(product) {
        return String(product.unit ?? 'pcs');
    }

    function renderProducts() {
        const keyword = productSearch.value.toLowerCase().trim();

        const filtered = products.filter(product => {
            const name = getProductName(product).toLowerCase();
            const sku = getProductSku(product).toLowerCase();
            const category = getProductCategory(product);

            const matchesCategory =
                activeCategory === 'Semua' ||
                category === activeCategory;

            const matchesSearch =
                name.includes(keyword) ||
                sku.includes(keyword);

            return matchesCategory && matchesSearch;
        });

        productCount.textContent = `${filtered.length} produk`;

        if (filtered.length === 0) {
            productsContainer.innerHTML = `
                <div class="empty-products">
                    Produk tidak ditemukan.
                </div>
            `;

            return;
        }

        productsContainer.innerHTML = filtered.map(product => {
            const stock = getProductStock(product);
            const price = getProductPrice(product);
            const name = getProductName(product);
            const category = getProductCategory(product);

            return `
                <button
                    type="button"
                    class="product-card"
                    onclick="addToCart(${Number(product.id)})"
                    ${stock <= 0 ? 'disabled' : ''}
                >
                    <div class="product-image">
                        <i class="bi bi-box-seam"></i>

                        <span class="stock-badge">
                            Stok ${stock}
                        </span>
                    </div>

                    <div class="product-name">
                        ${escapeHtml(name)}
                    </div>

                    <div class="product-category">
                        ${escapeHtml(category)}
                    </div>

                    <div class="product-bottom">
                        <span class="product-price">
                            ${rupiah(price)}
                        </span>

                        <span class="add-icon">
                            <i class="bi bi-plus-lg"></i>
                        </span>
                    </div>
                </button>
            `;
        }).join('');
    }

    function addToCart(productId) {
        const product = products.find(
            item => Number(item.id) === Number(productId)
        );

        if (!product) {
            showToast('Produk tidak ditemukan.');
            return;
        }

        const stock = getProductStock(product);

        if (stock <= 0) {
            showToast('Stok produk habis.');
            return;
        }

        const existing = cart.find(
            item => Number(item.id) === Number(productId)
        );

        if (existing) {
            if (existing.qty >= existing.stock) {
                showToast('Jumlah melebihi stok tersedia.');
                return;
            }

            existing.qty++;
        } else {
            cart.push({
                id: product.id,
                sku: product.sku,
                name: product.name,
                category: getProductCategory(product),
                price: getProductPrice(product),
                stock: stock,
                unit: getProductUnit(product),
                qty: 1
            });
        }

        renderCart();
    }

    function changeQty(productId, change) {
        const item = cart.find(
            cartItem => Number(cartItem.id) === Number(productId)
        );

        if (!item) {
            return;
        }

        const newQty = item.qty + change;

        if (newQty <= 0) {
            removeItem(productId);
            return;
        }

        if (newQty > item.stock) {
            showToast('Jumlah melebihi stok tersedia.');
            return;
        }

        item.qty = newQty;

        renderCart();
    }

    function removeItem(productId) {
        cart = cart.filter(
            item => Number(item.id) !== Number(productId)
        );

        renderCart();
    }

    function clearCart() {
        if (cart.length === 0) {
            return;
        }

        const confirmed = confirm(
            'Kosongkan semua produk dari keranjang?'
        );

        if (!confirmed) {
            return;
        }

        cart = [];
        discount = 0;
        discountInput.value = '';

        renderCart();
    }

    function getSubtotal() {
        return cart.reduce(
            (total, item) => total + (item.price * item.qty),
            0
        );
    }

    function getTotal() {
        return Math.max(
            0,
            getSubtotal() - discount
        );
    }

    function renderCart() {
        const totalItems = cart.reduce(
            (total, item) => total + item.qty,
            0
        );

        cartCount.textContent = totalItems;

        const subtotal = getSubtotal();
        const total = getTotal();

        subtotalElement.textContent = rupiah(subtotal);
        discountDisplay.textContent = rupiah(discount);
        grandTotal.textContent = rupiah(total);

        paymentButton.disabled = cart.length === 0;

        if (cart.length === 0) {
            cartContent.innerHTML = `
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="bi bi-bag"></i>
                    </div>

                    <strong>Keranjang masih kosong</strong>

                    <span>
                        Pilih produk untuk menambahkannya ke keranjang.
                    </span>
                </div>
            `;

            return;
        }

        cartContent.innerHTML = cart.map(item => {
            const itemTotal = item.price * item.qty;

            return `
                <div class="cart-item">
                    <div class="cart-item-main">

                        <div class="cart-item-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div class="cart-item-info">
                            <div class="cart-item-name">
                                ${escapeHtml(item.name)}
                            </div>

                            <div class="cart-item-price">
                                ${rupiah(item.price)} / ${escapeHtml(item.unit)}
                            </div>
                        </div>

                        <button
                            type="button"
                            class="cart-item-delete"
                            onclick="removeItem(${Number(item.id)})"
                            title="Hapus"
                        >
                            <i class="bi bi-trash3"></i>
                        </button>

                    </div>

                    <div class="cart-item-bottom">

                        <div class="quantity-control">

                            <button
                                type="button"
                                onclick="changeQty(${Number(item.id)}, -1)"
                            >
                                <i class="bi bi-dash"></i>
                            </button>

                            <span class="quantity-value">
                                ${item.qty}
                            </span>

                            <button
                                type="button"
                                onclick="changeQty(${Number(item.id)}, 1)"
                            >
                                <i class="bi bi-plus"></i>
                            </button>

                        </div>

                        <div class="cart-item-total">
                            ${rupiah(itemTotal)}
                        </div>

                    </div>
                </div>
            `;
        }).join('');
    }

    function applyDiscount() {
        const subtotal = getSubtotal();

        let value = Number(discountInput.value) || 0;

        if (value < 0) {
            value = 0;
        }

        if (value > subtotal) {
            value = subtotal;
        }

        discount = value;
        discountInput.value = value > 0 ? value : '';

        renderCart();

        if (value > 0) {
            showToast('Diskon berhasil diterapkan.');
        }
    }

    function openPayment() {
        if (cart.length === 0) {
            showToast('Keranjang masih kosong.');
            return;
        }

        paymentTotal.textContent = rupiah(getTotal());

        paymentMethod.value = 'Tunai';
        cashInput.value = '';
        changeValue.textContent = rupiah(0);

        cashSection.style.display = 'block';

        paymentModal.classList.add('show');

        setTimeout(() => {
            cashInput.focus();
        }, 100);
    }

    function closePayment() {
        paymentModal.classList.remove('show');
    }

    function updateCashChange() {
        const cash = Number(cashInput.value) || 0;
        const total = getTotal();

        const change = Math.max(
            0,
            cash - total
        );

        changeValue.textContent = rupiah(change);
    }

    function confirmPayment() {
        if (cart.length === 0) {
            return;
        }

        const method = paymentMethod.value;
        const total = getTotal();

        if (method === 'Tunai') {
            const cash = Number(cashInput.value) || 0;

            if (cash < total) {
                showToast('Uang yang diterima belum mencukupi.');
                cashInput.focus();
                return;
            }
        }

        const customer = customerName.value.trim();

        const transaction = {
            idmerchant: @json($idmerchant),
            customer_name: customer,
            payment_method: method,
            subtotal: getSubtotal(),
            discount: discount,
            total: total,
            items: cart.map(item => ({
                id: item.id,
                sku: item.sku,
                name: item.name,
                price: item.price,
                qty: item.qty,
                unit: item.unit
            }))
        };

        console.log('Transaksi:', transaction);

        closePayment();

        showToast('Pembayaran berhasil diproses.');

        cart = [];
        discount = 0;
        discountInput.value = '';

        renderCart();
    }

    function showToast(message) {
        const toast = document.getElementById('toast');

        toast.textContent = message;
        toast.classList.add('show');

        clearTimeout(window.toastTimer);

        window.toastTimer = setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }

    document.querySelectorAll('.category-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.category-button').forEach(item => {
                item.classList.remove('active');
            });

            button.classList.add('active');

            activeCategory = button.dataset.category;

            renderProducts();
        });
    });

    productSearch.addEventListener('input', renderProducts);

    document
        .getElementById('clearCart')
        .addEventListener('click', clearCart);

    document
        .getElementById('discountButton')
        .addEventListener('click', applyDiscount);

    discountInput.addEventListener('keydown', event => {
        if (event.key === 'Enter') {
            applyDiscount();
        }
    });

    paymentButton.addEventListener('click', openPayment);

    document
        .getElementById('closePayment')
        .addEventListener('click', closePayment);

    paymentMethod.addEventListener('change', () => {
        if (paymentMethod.value === 'Tunai') {
            cashSection.style.display = 'block';
        } else {
            cashSection.style.display = 'none';
        }
    });

    cashInput.addEventListener('input', updateCashChange);

    document
        .getElementById('confirmPayment')
        .addEventListener('click', confirmPayment);

    paymentModal.addEventListener('click', event => {
        if (event.target === paymentModal) {
            closePayment();
        }
    });

    document
        .getElementById('scanButton')
        .addEventListener('click', () => {
            productSearch.focus();
            showToast('Masukkan SKU produk pada kolom pencarian.');
        });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            closePayment();
        }
    });

    const now = new Date();

    document.getElementById('currentDate').textContent =
        now.toLocaleDateString('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });

    renderProducts();
    renderCart();
</script>

</body>
</html> 