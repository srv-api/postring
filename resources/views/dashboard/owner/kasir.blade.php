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
            font-family: Inter, sans-serif;
            font-size: 13px;
        }

        button,
        input,
        select {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
        }

        /* HEADER */

        .topbar {
            height: 68px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 210px;
        }

        .brand img {
            width: 38px;
            height: 38px;
            object-fit: contain;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .brand-name span {
            color: var(--primary);
        }

        .brand-caption {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-icon {
            width: 38px;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: #fff;
            color: #5D5662;
            display: grid;
            place-items: center;
            font-size: 17px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 8px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-weight: 800;
        }

        .user-name {
            font-size: 12px;
            font-weight: 700;
        }

        .user-role {
            font-size: 10px;
            color: var(--muted);
            margin-top: 3px;
        }

        /* MAIN LAYOUT */

        .main {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 390px;
            min-height: calc(100vh - 68px);
        }

        .catalog {
            padding: 25px 28px 35px;
            min-width: 0;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 22px;
        }

        .page-heading h1 {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .page-heading p {
            color: var(--muted);
            margin-top: 7px;
            font-size: 12px;
        }

        .date-label {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 11px 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            white-space: nowrap;
            font-size: 11px;
        }

        /* SEARCH */

        .search-row {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #99919F;
            font-size: 16px;
        }

        .search-box input {
            width: 100%;
            height: 47px;
            padding: 0 15px 0 43px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            outline: none;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(127, 0, 121, .07);
        }

        .scan-button {
            height: 47px;
            padding: 0 16px;
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 12px;
            color: #514A56;
            display: flex;
            align-items: center;
            gap: 9px;
            font-weight: 600;
        }

        /* CATEGORIES */

        .categories {
            display: flex;
            gap: 9px;
            overflow-x: auto;
            padding-bottom: 4px;
            margin-bottom: 22px;
        }

        .category-button {
            flex-shrink: 0;
            border: 1px solid var(--border);
            background: #fff;
            color: #6B6470;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: 600;
        }

        .category-button.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        /* PRODUCT GRID */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .section-heading h2 {
            font-size: 15px;
            font-weight: 800;
        }

        .section-heading span {
            font-size: 11px;
            color: var(--muted);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .product-card {
            min-width: 0;
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 14px;
            padding: 11px;
            text-align: left;
            transition: .18s ease;
        }

        .product-card:hover {
            border-color: var(--primary);
            box-shadow: 0 7px 20px rgba(44, 20, 46, .07);
            transform: translateY(-2px);
        }

        .product-image {
            height: 112px;
            border-radius: 10px;
            background: linear-gradient(135deg, #F8EAF7, #F1E8F4);
            display: grid;
            place-items: center;
            margin-bottom: 12px;
            color: var(--primary);
            font-size: 35px;
            position: relative;
        }

        .product-image .stock-badge {
            position: absolute;
            bottom: 7px;
            right: 7px;
            border-radius: 6px;
            padding: 4px 6px;
            background: rgba(255,255,255,.9);
            color: #6E6571;
            font-size: 9px;
            font-weight: 700;
        }

        .product-name {
            font-size: 12px;
            line-height: 1.45;
            font-weight: 700;
            min-height: 34px;
        }

        .product-category {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5px;
            margin-top: 13px;
        }

        .product-price {
            color: var(--primary);
            font-size: 12px;
            font-weight: 800;
        }

        .add-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 16px;
        }

        .empty-products {
            grid-column: 1 / -1;
            background: #fff;
            padding: 35px;
            text-align: center;
            color: var(--muted);
            border: 1px dashed var(--border);
            border-radius: 12px;
        }

        /* CART */

        .cart-panel {
            background: #fff;
            border-left: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: calc(100vh - 68px);
            position: sticky;
            top: 68px;
            height: calc(100vh - 68px);
        }

        .cart-header {
            padding: 22px 21px 18px;
            border-bottom: 1px solid var(--border);
        }

        .cart-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 16px;
            font-weight: 800;
        }

        .cart-count {
            min-width: 23px;
            height: 23px;
            padding: 0 6px;
            display: grid;
            place-items: center;
            border-radius: 7px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 10px;
            font-weight: 800;
        }

        .clear-cart {
            border: 0;
            background: transparent;
            color: var(--red);
            font-size: 11px;
            font-weight: 600;
        }

        .customer-field {
            margin-top: 17px;
            position: relative;
        }

        .customer-field i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #99919F;
        }

        .customer-field input {
            width: 100%;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 12px 0 36px;
            outline: none;
            font-size: 11px;
        }

        .customer-field input:focus {
            border-color: var(--primary);
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 12px 20px;
            min-height: 150px;
        }

        .cart-empty {
            height: 100%;
            min-height: 230px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--muted);
        }

        .cart-empty-icon {
            width: 65px;
            height: 65px;
            border-radius: 20px;
            background: #F7F4F8;
            color: #B6AAB9;
            display: grid;
            place-items: center;
            font-size: 27px;
            margin-bottom: 15px;
        }

        .cart-empty strong {
            color: #514A56;
            font-size: 12px;
        }

        .cart-empty p {
            font-size: 11px;
            margin-top: 7px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 42px minmax(0, 1fr);
            gap: 11px;
            padding: 13px 0;
            border-bottom: 1px solid #F1EDF2;
        }

        .cart-item-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .cart-item-main {
            min-width: 0;
        }

        .cart-item-top {
            display: flex;
            justify-content: space-between;
            gap: 8px;
        }

        .cart-item-name {
            font-size: 11px;
            font-weight: 700;
            line-height: 1.5;
        }

        .cart-item-price {
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .cart-item-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 9px;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qty-control button {
            width: 25px;
            height: 25px;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: #fff;
            color: #514A56;
        }

        .qty-control span {
            min-width: 12px;
            text-align: center;
            font-size: 11px;
            font-weight: 700;
        }

        .remove-item {
            border: 0;
            background: transparent;
            color: #B7AEBB;
            font-size: 14px;
        }

        /* CART SUMMARY */

        .cart-summary {
            padding: 17px 21px 21px;
            border-top: 1px solid var(--border);
            background: #fff;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 11px;
        }

        .summary-line strong {
            color: var(--text);
            font-weight: 700;
        }

        .discount-line {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
        }

        .discount-line input {
            width: 100%;
            min-width: 0;
            height: 36px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0 10px;
            outline: none;
            font-size: 11px;
        }

        .discount-line button {
            border: 1px solid var(--primary);
            color: var(--primary);
            background: var(--primary-light);
            padding: 0 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
        }

        .total-line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px dashed var(--border);
            padding-top: 15px;
            margin-top: 5px;
            margin-bottom: 17px;
        }

        .total-label {
            font-size: 12px;
            font-weight: 700;
        }

        .total-value {
            color: var(--primary);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .checkout-button {
            width: 100%;
            height: 49px;
            border: 0;
            border-radius: 11px;
            background: var(--primary);
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            transition: .2s ease;
        }

        .checkout-button:hover {
            background: var(--primary-dark);
        }

        .checkout-button:disabled {
            background: #C9C2CC;
            cursor: not-allowed;
        }

        /* PAYMENT MODAL */

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 100;
            background: rgba(25, 16, 28, .48);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-backdrop.show {
            display: flex;
        }

        .payment-modal {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 20px 70px rgba(0,0,0,.2);
        }

        .modal-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .modal-heading h2 {
            font-size: 18px;
            font-weight: 800;
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border: 0;
            background: #F5F2F6;
            border-radius: 9px;
            font-size: 17px;
        }

        .payment-total {
            background: var(--primary-light);
            border-radius: 12px;
            padding: 17px;
            margin-bottom: 20px;
        }

        .payment-total span {
            color: #786A7A;
            font-size: 11px;
        }

        .payment-total strong {
            display: block;
            color: var(--primary);
            font-size: 25px;
            margin-top: 7px;
        }

        .payment-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .payment-select,
        .cash-input {
            width: 100%;
            height: 44px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 12px;
            margin-bottom: 17px;
            background: #fff;
            outline: none;
        }

        .cash-change {
            display: flex;
            justify-content: space-between;
            margin: -4px 0 18px;
            font-size: 11px;
            color: var(--muted);
        }

        .cash-change strong {
            color: var(--green);
        }

        .confirm-payment {
            width: 100%;
            height: 46px;
            border: 0;
            border-radius: 10px;
            background: var(--primary);
            color: #fff;
            font-weight: 800;
        }

        .payment-notice {
            font-size: 10px;
            color: var(--muted);
            line-height: 1.6;
            margin-top: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .main {
                grid-template-columns: minmax(0, 1fr) 350px;
            }

            .products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .catalog {
                padding: 22px;
            }
        }

        @media (max-width: 900px) {
            .main {
                grid-template-columns: 1fr;
            }

            .cart-panel {
                position: static;
                height: auto;
                min-height: 600px;
                border-left: 0;
                border-top: 1px solid var(--border);
            }

            .cart-items {
                max-height: 400px;
            }

            .products {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 560px) {
            .topbar {
                height: 60px;
                padding: 0 15px;
            }

            .brand {
                min-width: 0;
            }

            .brand img {
                width: 32px;
                height: 32px;
            }

            .brand-name {
                font-size: 15px;
            }

            .user-info {
                display: none;
            }

            .catalog {
                padding: 20px 14px;
            }

            .page-heading h1 {
                font-size: 22px;
            }

            .date-label {
                display: none;
            }

            .search-row {
                gap: 8px;
            }

            .scan-button {
                padding: 0 12px;
            }

            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .product-image {
                height: 100px;
            }

            .cart-header,
            .cart-summary {
                padding-left: 15px;
                padding-right: 15px;
            }

            .cart-items {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    {{-- HEADER --}}
    <header class="topbar">

        <div class="brand">
            <img src="{{ asset('tr.png') }}" alt="Tring">

            <div>
                <div class="brand-name">Tring<span>POS</span></div>
                <div class="brand-caption">Point of Sale</div>
            </div>
        </div>

        <div class="header-right">

            <button
                type="button"
                class="header-icon"
                title="Notifikasi"
            >
                <i class="bi bi-bell"></i>
            </button>

            <div class="user-profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div class="user-info">
                    <div class="user-name">
                        {{ auth()->user()->name ?? 'Pengguna' }}
                    </div>

                    <div class="user-role">Kasir</div>
                </div>
            </div>

        </div>

    </header>


    <main class="main">

        {{-- PRODUCT CATALOG --}}
        <section class="catalog">

            <div class="page-heading">

                <div>
                    <h1>Kasir</h1>
                    <p>Pilih produk untuk memulai transaksi.</p>
                </div>

                <div class="date-label">
                    <i class="bi bi-calendar3"></i>
                    <span id="currentDate"></span>
                </div>

            </div>


            {{-- SEARCH --}}
            <div class="search-row">

                <div class="search-box">
                    <i class="bi bi-search"></i>

                    <input
                        type="search"
                        id="productSearch"
                        placeholder="Cari nama produk atau kode..."
                        autocomplete="off"
                    >
                </div>

                <button
                    type="button"
                    class="scan-button"
                    onclick="alert('Fitur scan barcode belum dihubungkan.')"
                >
                    <i class="bi bi-upc-scan"></i>
                    <span>Scan</span>
                </button>

            </div>


            {{-- CATEGORIES --}}
            <div class="categories" id="categories">

                <button
                    type="button"
                    class="category-button active"
                    data-category="Semua"
                >
                    Semua Produk
                </button>

                <button
                    type="button"
                    class="category-button"
                    data-category="Makanan"
                >
                    Makanan
                </button>

                <button
                    type="button"
                    class="category-button"
                    data-category="Minuman"
                >
                    Minuman
                </button>

                <button
                    type="button"
                    class="category-button"
                    data-category="Snack"
                >
                    Snack
                </button>

                <button
                    type="button"
                    class="category-button"
                    data-category="Lainnya"
                >
                    Lainnya
                </button>

            </div>


            <div class="section-heading">
                <h2>Daftar Produk</h2>
                <span id="productCount">0 produk</span>
            </div>


            {{-- PRODUCT LIST --}}
            <div class="products" id="products"></div>

        </section>


        {{-- CART PANEL --}}
        <aside class="cart-panel">

            <div class="cart-header">

                <div class="cart-title-row">

                    <div class="cart-title">
                        <i class="bi bi-bag"></i>
                        Keranjang
                        <span class="cart-count" id="cartCount">0</span>
                    </div>

                    <button
                        type="button"
                        class="clear-cart"
                        onclick="clearCart()"
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
                    >
                </div>

            </div>


            <div class="cart-items" id="cartItems">

                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="bi bi-bag"></i>
                    </div>

                    <strong>Keranjang masih kosong</strong>

                    <p>Pilih produk untuk menambahkannya ke transaksi.</p>
                </div>

            </div>


            <div class="cart-summary">

                <div class="summary-line">
                    <span>Subtotal</span>
                    <strong id="subtotal">Rp0</strong>
                </div>

                <div class="summary-line">
                    <span>Diskon</span>
                    <strong id="discountDisplay">Rp0</strong>
                </div>

                <div class="discount-line">
                    <input
                        type="number"
                        id="discountInput"
                        min="0"
                        placeholder="Diskon nominal (Rp)"
                    >

                    <button type="button" onclick="applyDiscount()">
                        Terapkan
                    </button>
                </div>

                <div class="total-line">
                    <span class="total-label">Total Pembayaran</span>
                    <strong class="total-value" id="grandTotal">Rp0</strong>
                </div>

                <button
                    type="button"
                    class="checkout-button"
                    id="checkoutButton"
                    onclick="openPayment()"
                    disabled
                >
                    <i class="bi bi-credit-card"></i>
                    Proses Pembayaran
                </button>

            </div>

        </aside>

    </main>

</div>


{{-- PAYMENT MODAL --}}
<div class="modal-backdrop" id="paymentModal">

    <div class="payment-modal">

        <div class="modal-heading">
            <h2>Pembayaran</h2>

            <button
                type="button"
                class="modal-close"
                onclick="closePayment()"
            >
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="payment-total">
            <span>Total yang harus dibayar</span>
            <strong id="paymentTotal">Rp0</strong>
        </div>

        <label class="payment-label" for="paymentMethod">
            Metode Pembayaran
        </label>

        <select id="paymentMethod" class="payment-select">
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Kartu Debit">Kartu Debit</option>
        </select>

        <div id="cashSection">

            <label class="payment-label" for="cashReceived">
                Uang Diterima
            </label>

            <input
                type="number"
                id="cashReceived"
                class="cash-input"
                min="0"
                placeholder="Masukkan jumlah uang"
            >

            <div class="cash-change">
                <span>Kembalian</span>
                <strong id="cashChange">Rp0</strong>
            </div>

        </div>

        <button
            type="button"
            class="confirm-payment"
            onclick="confirmPayment()"
        >
            Konfirmasi Pembayaran
        </button>

        <p class="payment-notice">
            Mode tampilan: tombol konfirmasi hanya menampilkan ringkasan
            transaksi. Pembayaran belum diproses dan belum disimpan ke database.
        </p>

    </div>

</div>


<script>
    /*
    |--------------------------------------------------------------------------
    | Data produk contoh
    |--------------------------------------------------------------------------
    | Ganti data ini dengan produk dari database setelah halaman kasir siap.
    */

    const products = [
        {
            id: 1,
            name: 'Kopi Susu Gula Aren',
            category: 'Minuman',
            price: 18000,
            stock: 24,
            icon: 'bi-cup-hot'
        },
        {
            id: 2,
            name: 'Es Teh Manis',
            category: 'Minuman',
            price: 8000,
            stock: 35,
            icon: 'bi-cup-straw'
        },
        {
            id: 3,
            name: 'Air Mineral 600ml',
            category: 'Minuman',
            price: 5000,
            stock: 40,
            icon: 'bi-droplet'
        },
        {
            id: 4,
            name: 'Nasi Ayam',
            category: 'Makanan',
            price: 25000,
            stock: 18,
            icon: 'bi-egg-fried'
        },
        {
            id: 5,
            name: 'Mie Goreng',
            category: 'Makanan',
            price: 20000,
            stock: 15,
            icon: 'bi-egg'
        },
        {
            id: 6,
            name: 'Roti Cokelat',
            category: 'Snack',
            price: 12000,
            stock: 20,
            icon: 'bi-basket'
        },
        {
            id: 7,
            name: 'Kentang Goreng',
            category: 'Snack',
            price: 15000,
            stock: 16,
            icon: 'bi-box'
        },
        {
            id: 8,
            name: 'Puding Cokelat',
            category: 'Snack',
            price: 10000,
            stock: 12,
            icon: 'bi-cake2'
        },
        {
            id: 9,
            name: 'Tisu',
            category: 'Lainnya',
            price: 7000,
            stock: 30,
            icon: 'bi-box-seam'
        },
        {
            id: 10,
            name: 'Kopi Hitam',
            category: 'Minuman',
            price: 12000,
            stock: 22,
            icon: 'bi-cup'
        },
        {
            id: 11,
            name: 'Roti Keju',
            category: 'Snack',
            price: 14000,
            stock: 14,
            icon: 'bi-basket2'
        },
        {
            id: 12,
            name: 'Nasi Goreng',
            category: 'Makanan',
            price: 23000,
            stock: 10,
            icon: 'bi-egg-fried'
        }
    ];

    let cart = [];
    let activeCategory = 'Semua';
    let discount = 0;

    const rupiah = amount => new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0
    }).format(amount);


    /*
    |--------------------------------------------------------------------------
    | Date
    |--------------------------------------------------------------------------
    */

    document.getElementById('currentDate').textContent =
        new Intl.DateTimeFormat('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        }).format(new Date());


    /*
    |--------------------------------------------------------------------------
    | Render products
    |--------------------------------------------------------------------------
    */

    function renderProducts() {
        const keyword = document
            .getElementById('productSearch')
            .value
            .toLowerCase()
            .trim();

        const filtered = products.filter(product => {
            const matchesCategory =
                activeCategory === 'Semua' ||
                product.category === activeCategory;

            const matchesSearch =
                product.name.toLowerCase().includes(keyword) ||
                String(product.id).includes(keyword);

            return matchesCategory && matchesSearch;
        });

        document.getElementById('productCount').textContent =
            `${filtered.length} produk`;

        const container = document.getElementById('products');

        if (filtered.length === 0) {
            container.innerHTML = `
                <div class="empty-products">
                    Produk tidak ditemukan.
                </div>
            `;
            return;
        }

        container.innerHTML = filtered.map(product => `
            <button
                type="button"
                class="product-card"
                onclick="addToCart(${product.id})"
                ${product.stock <= 0 ? 'disabled' : ''}
            >
                <div class="product-image">
                    <i class="bi ${product.icon}"></i>
                    <span class="stock-badge">
                        Stok ${product.stock}
                    </span>
                </div>

                <div class="product-name">
                    ${escapeHtml(product.name)}
                </div>

                <div class="product-category">
                    ${escapeHtml(product.category)}
                </div>

                <div class="product-bottom">
                    <span class="product-price">
                        ${rupiah(product.price)}
                    </span>

                    <span class="add-icon">
                        <i class="bi bi-plus-lg"></i>
                    </span>
                </div>
            </button>
        `).join('');
    }


    /*
    |--------------------------------------------------------------------------
    | Prevent HTML injection in product names
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[character]);
    }


    /*
    |--------------------------------------------------------------------------
    | Category filtering
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.category-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.category-button')
                .forEach(item => item.classList.remove('active'));

            button.classList.add('active');
            activeCategory = button.dataset.category;

            renderProducts();
        });
    });


    document
        .getElementById('productSearch')
        .addEventListener('input', renderProducts);


    /*
    |--------------------------------------------------------------------------
    | Cart
    |--------------------------------------------------------------------------
    */

    function addToCart(productId) {
        const product = products.find(item => item.id === productId);

        if (!product || product.stock <= 0) {
            return;
        }

        const existing = cart.find(item => item.id === productId);

        if (existing) {
            if (existing.qty >= product.stock) {
                alert('Jumlah melebihi stok yang tersedia.');
                return;
            }

            existing.qty++;
        } else {
            cart.push({
                ...product,
                qty: 1
            });
        }

        renderCart();
    }


    function changeQty(productId, change) {
        const item = cart.find(item => item.id === productId);
        const product = products.find(item => item.id === productId);

        if (!item || !product) {
            return;
        }

        const nextQty = item.qty + change;

        if (nextQty <= 0) {
            cart = cart.filter(item => item.id !== productId);
        } else if (nextQty > product.stock) {
            alert('Jumlah melebihi stok yang tersedia.');
            return;
        } else {
            item.qty = nextQty;
        }

        renderCart();
    }


    function removeItem(productId) {
        cart = cart.filter(item => item.id !== productId);
        renderCart();
    }


    function clearCart() {
        if (cart.length === 0) {
            return;
        }

        if (!confirm('Kosongkan semua produk dari keranjang?')) {
            return;
        }

        cart = [];
        discount = 0;
        document.getElementById('discountInput').value = '';

        renderCart();
    }


    function getSubtotal() {
        return cart.reduce((total, item) => {
            return total + (item.price * item.qty);
        }, 0);
    }


    function getTotal() {
        return Math.max(0, getSubtotal() - discount);
    }


    function renderCart() {
        const container = document.getElementById('cartItems');
        const count = cart.reduce((total, item) => total + item.qty, 0);

        document.getElementById('cartCount').textContent = count;
        document.getElementById('subtotal').textContent = rupiah(getSubtotal());
        document.getElementById('discountDisplay').textContent = rupiah(discount);
        document.getElementById('grandTotal').textContent = rupiah(getTotal());

        document.getElementById('checkoutButton').disabled =
            cart.length === 0;

        if (cart.length === 0) {
            container.innerHTML = `
                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="bi bi-bag"></i>
                    </div>

                    <strong>Keranjang masih kosong</strong>
                    <p>Pilih produk untuk menambahkannya ke transaksi.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = cart.map(item => `
            <div class="cart-item">

                <div class="cart-item-icon">
                    <i class="bi ${item.icon}"></i>
                </div>

                <div class="cart-item-main">

                    <div class="cart-item-top">
                        <div class="cart-item-name">
                            ${escapeHtml(item.name)}
                        </div>

                        <div class="cart-item-price">
                            ${rupiah(item.price * item.qty)}
                        </div>
                    </div>

                    <div class="cart-item-bottom">

                        <div class="qty-control">
                            <button
                                type="button"
                                onclick="changeQty(${item.id}, -1)"
                            >
                                <i class="bi bi-dash"></i>
                            </button>

                            <span>${item.qty}</span>

                            <button
                                type="button"
                                onclick="changeQty(${item.id}, 1)"
                            >
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>

                        <button
                            type="button"
                            class="remove-item"
                            title="Hapus produk"
                            onclick="removeItem(${item.id})"
                        >
                            <i class="bi bi-trash3"></i>
                        </button>

                    </div>

                </div>

            </div>
        `).join('');
    }


    /*
    |--------------------------------------------------------------------------
    | Discount
    |--------------------------------------------------------------------------
    */

    function applyDiscount() {
        const inputValue = Number(
            document.getElementById('discountInput').value
        );

        if (!Number.isFinite(inputValue) || inputValue < 0) {
            alert('Masukkan nominal diskon yang valid.');
            return;
        }

        discount = Math.min(inputValue, getSubtotal());

        document.getElementById('discountInput').value = discount;

        renderCart();
    }


    /*
    |--------------------------------------------------------------------------
    | Payment modal
    |--------------------------------------------------------------------------
    */

    function openPayment() {
        if (cart.length === 0) {
            return;
        }

        document.getElementById('paymentTotal').textContent =
            rupiah(getTotal());

        document.getElementById('paymentModal').classList.add('show');

        updateCashChange();
    }


    function closePayment() {
        document.getElementById('paymentModal').classList.remove('show');
    }


    document
        .getElementById('paymentMethod')
        .addEventListener('change', function () {
            const isCash = this.value === 'Tunai';

            document.getElementById('cashSection').style.display =
                isCash ? 'block' : 'none';

            updateCashChange();
        });


    document
        .getElementById('cashReceived')
        .addEventListener('input', updateCashChange);


    function updateCashChange() {
        const method = document.getElementById('paymentMethod').value;
        const received = Number(
            document.getElementById('cashReceived').value || 0
        );

        const change = received - getTotal();

        document.getElementById('cashChange').textContent =
            rupiah(Math.max(0, change));

        document.getElementById('cashChange').style.color =
            change >= 0 ? 'var(--green)' : 'var(--red)';
    }


    function confirmPayment() {
        const method = document.getElementById('paymentMethod').value;
        const total = getTotal();
        const received = Number(
            document.getElementById('cashReceived').value || 0
        );

        if (method === 'Tunai' && received < total) {
            alert('Uang yang diterima belum mencukupi.');
            return;
        }

        const orderSummary = cart.map(item => {
            return `${item.name} x${item.qty}`;
        }).join('\n');

        const change = method === 'Tunai'
            ? received - total
            : 0;

        alert(
            'Ringkasan transaksi demo\n\n' +
            orderSummary +
            '\n\nTotal: ' + rupiah(total) +
            '\nMetode: ' + method +
            (method === 'Tunai'
                ? '\nUang diterima: ' + rupiah(received) +
                  '\nKembalian: ' + rupiah(change)
                : '') +
            '\n\nTransaksi belum disimpan ke database.'
        );

        closePayment();
    }


    /*
    |--------------------------------------------------------------------------
    | Initial render
    |--------------------------------------------------------------------------
    */

    renderProducts();
    renderCart();
</script>

</body>
</html>