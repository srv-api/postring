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

    <title>Produk - Tring POS</title>

    <link
        rel="icon"
        type="image/png"
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

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--black);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;

            width: var(--sidebar-width);

            background: var(--white);
            border-right: 1px solid var(--border);

            display: flex;
            flex-direction: column;

            z-index: 100;
        }

        .sidebar-header {
            height: 76px;

            display: flex;
            align-items: center;

            padding: 0 24px;

            border-bottom: 1px solid var(--border);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .brand-name {
            color: var(--primary);
            font-size: 20px;
            font-weight: 800;
        }

        .brand-pos {
            display: block;
            margin-top: 1px;

            color: var(--gray-3);

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            flex: 1;
            padding: 22px 14px;
            overflow-y: auto;
        }

        .menu-label {
            padding: 0 12px;
            margin-bottom: 9px;

            color: var(--gray-3);

            font-size: 9px;
            font-weight: 700;

            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;

            width: 100%;

            padding: 11px 12px;
            margin-bottom: 4px;

            border-radius: 9px;

            color: var(--gray-2);

            font-size: 12px;
            font-weight: 600;

            transition: .2s;
        }

        .menu-item i {
            width: 19px;
            font-size: 16px;
            text-align: center;
        }

        .menu-item:hover,
        .menu-item.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-footer {
            padding: 15px;
            border-top: 1px solid var(--border);
        }

        .merchant-box {
            padding: 12px;

            background: #FAFAFA;

            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .merchant-label {
            color: var(--gray-3);
            font-size: 9px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .merchant-id {
            color: var(--gray-1);
            font-size: 11px;
            font-weight: 700;
            word-break: break-all;
        }

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .topbar {
            height: 76px;

            background: var(--white);
            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 32px;

            position: sticky;
            top: 0;

            z-index: 50;
        }

        .page-title h1 {
            font-size: 19px;
            font-weight: 800;
        }

        .page-title p {
            margin-top: 4px;
            color: var(--gray-3);
            font-size: 10px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            color: var(--gray-1);
            font-size: 11px;
            font-weight: 700;
        }

        .user-role {
            margin-top: 3px;
            color: var(--gray-3);
            font-size: 9px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 15px;
            font-weight: 800;
        }

        .content {
            padding: 30px 32px;
        }

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px 15px;
            margin-bottom: 20px;

            border-radius: 9px;

            font-size: 11px;
        }

        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
        }

        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #991B1B;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 22px;
        }

        .heading-title {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .heading-description {
            margin-top: 6px;
            color: var(--gray-2);
            font-size: 11px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 11px 16px;

            background: var(--primary);
            color: white;

            border: none;
            border-radius: 9px;

            font-size: 11px;
            font-weight: 700;

            transition: .2s;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .filter-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;

            padding: 16px;

            margin-bottom: 18px;
        }

        .filter-form {
            display: grid;

            grid-template-columns: minmax(0, 1fr) 220px auto;

            gap: 10px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;

            left: 12px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--gray-3);

            font-size: 14px;
        }

        .form-control,
        .form-select {
            width: 100%;

            height: 42px;

            padding: 0 12px;

            border: 1px solid var(--border);
            border-radius: 8px;

            background: white;

            color: var(--gray-1);

            font-size: 11px;

            outline: none;
        }

        .input-wrap .form-control {
            padding-left: 36px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(127, 0, 121, .08);
        }

        .btn-filter {
            height: 42px;

            padding: 0 17px;

            border: 1px solid var(--border);
            border-radius: 8px;

            background: white;

            color: var(--gray-1);

            font-size: 11px;
            font-weight: 700;
        }

        .btn-filter:hover {
            background: var(--primary-light);
            border-color: rgba(127, 0, 121, .2);
            color: var(--primary);
        }

        .product-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 12px;

            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 14px 18px;

            background: #FAFAFA;

            border-bottom: 1px solid var(--border);

            color: var(--gray-3);

            font-size: 9px;
            font-weight: 700;

            text-align: left;
            text-transform: uppercase;
        }

        td {
            padding: 15px 18px;

            border-bottom: 1px solid #F1F1F1;

            color: var(--gray-1);

            font-size: 10px;
        }

        tbody tr:hover {
            background: #FCFCFC;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .product-name {
            color: var(--gray-1);
            font-size: 11px;
            font-weight: 700;
        }

        .product-sku {
            margin-top: 4px;
            color: var(--gray-3);
            font-size: 8px;
        }

        .category {
            display: inline-flex;

            padding: 5px 8px;

            border-radius: 6px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 8px;
            font-weight: 700;
        }

        .price {
            font-weight: 700;
        }

        .stock {
            font-weight: 700;
        }

        .stock.low {
            color: var(--warning);
        }

        .stock.empty {
            color: var(--danger);
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 5px 8px;

            border-radius: 20px;

            font-size: 8px;
            font-weight: 700;
        }

        .status.active {
            background: #F0FDF4;
            color: var(--success);
        }

        .status.inactive {
            background: #F5F5F5;
            color: var(--gray-3);
        }

        .status::before {
            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: currentColor;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn {
            width: 32px;
            height: 32px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 7px;

            background: white;

            color: var(--gray-2);

            font-size: 13px;
        }

        .action-btn:hover {
            background: var(--primary-light);
            border-color: rgba(127,0,121,.2);
            color: var(--primary);
        }

        .action-btn.delete:hover {
            background: #FEF2F2;
            border-color: #FECACA;
            color: var(--danger);
        }

        .empty {
            padding: 60px 20px;

            text-align: center;
        }

        .empty-icon {
            width: 52px;
            height: 52px;

            margin: 0 auto 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 22px;
        }

        .empty-title {
            font-size: 13px;
            font-weight: 800;
        }

        .empty-description {
            margin-top: 5px;
            color: var(--gray-3);
            font-size: 10px;
        }

        .pagination {
            padding: 15px 18px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            border-top: 1px solid var(--border);
        }

        .pagination-info {
            color: var(--gray-3);
            font-size: 9px;
        }

        .pagination-links {
            display: flex;
            gap: 5px;
        }

        .pagination-links a,
        .pagination-links span {
            min-width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);
            border-radius: 7px;

            font-size: 9px;
        }

        .pagination-links .active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .mobile-header {
            display: none;
        }

        @media (max-width: 900px) {

            .filter-form {
                grid-template-columns: 1fr;
            }

            .filter-form .btn-filter {
                width: 100%;
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

                background: white;

                border-bottom: 1px solid var(--border);
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
            }

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 25px 20px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
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

            .content {
                padding: 22px 15px;
            }

            .heading-title {
                font-size: 21px;
            }

            .btn-primary {
                width: 100%;
            }

            .page-heading {
                gap: 15px;
            }

        }

    </style>

</head>

<body>

<div class="app">

    {{-- SIDEBAR --}}

    <aside class="sidebar">

        <div class="sidebar-header">

            <a
                href="{{ route('dashboard.owner', ['idmerchant' => $merchant['idmerchant']]) }}"
                class="brand"
            >

                <img
                    src="{{ asset('tr.png') }}"
                    alt="Tring.id"
                >

                <div>

                    <div class="brand-name">
                        Tring.id
                    </div>

                    <span class="brand-pos">
                        Point of Sale
                    </span>

                </div>

            </a>

        </div>

        <nav class="sidebar-menu">

            <div class="menu-label">
                Utama
            </div>

            <a
                href="{{ route('dashboard.owner', ['idmerchant' => $merchant['idmerchant']]) }}"
                class="menu-item"
            >
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <div
                class="menu-label"
                style="margin-top: 25px;"
            >
                Operasional
            </div>

            <a
                href="{{ route('cashier', ['idmerchant' => $merchant['idmerchant']]) }}"
                class="menu-item"
            >
                <i class="bi bi-cart3"></i>
                <span>Kasir</span>
            </a>

            <a
                href="{{ route('products.index', ['idmerchant' => $merchant['idmerchant']]) }}"
                class="menu-item active"
            >
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>

            <a href="#" class="menu-item">
                <i class="bi bi-archive"></i>
                <span>Stok</span>
            </a>

            <a href="#" class="menu-item">
                <i class="bi bi-people"></i>
                <span>Pelanggan</span>
            </a>

            <div
                class="menu-label"
                style="margin-top: 25px;"
            >
                Laporan
            </div>

            <a href="#" class="menu-item">
                <i class="bi bi-receipt"></i>
                <span>Transaksi</span>
            </a>

            <a href="#" class="menu-item">
                <i class="bi bi-bar-chart"></i>
                <span>Laporan Penjualan</span>
            </a>

            <div
                class="menu-label"
                style="margin-top: 25px;"
            >
                Pengaturan
            </div>

            <a href="#" class="menu-item">
                <i class="bi bi-shop"></i>
                <span>Merchant</span>
            </a>

            <a href="#" class="menu-item">
                <i class="bi bi-person-badge"></i>
                <span>Pengguna</span>
            </a>

        </nav>

        <div class="sidebar-footer">

            <div class="merchant-box">

                <div class="merchant-label">
                    MERCHANT ID
                </div>

                <div class="merchant-id">
                    {{ $merchant['idmerchant'] }}
                </div>

            </div>

        </div>

    </aside>


    {{-- MAIN --}}

    <main class="main">

        {{-- MOBILE HEADER --}}

        <div class="mobile-header">

            <a
                href="{{ route('dashboard.owner', ['idmerchant' => $merchant['idmerchant']]) }}"
                class="mobile-brand"
            >

                <img
                    src="{{ asset('tr.png') }}"
                    alt="Tring.id"
                >

                <span>
                    Tring POS
                </span>

            </a>

            <div class="user-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

        </div>


        {{-- TOPBAR --}}

        <header class="topbar">

            <div class="page-title">

                <h1>
                    Produk
                </h1>

                <p>
                    Kelola produk dan harga jual merchant
                </p>

            </div>

            <div class="user-area">

                <div class="user-info">

                    <div class="user-name">
                        {{ $user->name }}
                    </div>

                    <div class="user-role">
                        Owner
                    </div>

                </div>

                <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

            </div>

        </header>


        <div class="content">

            @if (session('success'))

                <div class="alert alert-success">

                    <i class="bi bi-check-circle-fill"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            @if ($errors->any())

                <div class="alert alert-danger">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>

            @endif


            {{-- HEADING --}}

            <div class="page-heading">

                <div>

                    <div class="heading-title">
                        Daftar Produk
                    </div>

                    <div class="heading-description">
                        Tambahkan dan kelola produk yang tersedia di merchant kamu.
                    </div>

                </div>

                <a
                    href="{{ route('products.create', ['idmerchant' => $merchant['idmerchant']]) }}"
                    class="btn-primary"
                >
                    <i class="bi bi-plus-lg"></i>
                    Tambah Produk
                </a>

            </div>


            {{-- FILTER --}}

            <div class="filter-card">

                <form
                    action="{{ route('products.index', ['idmerchant' => $merchant['idmerchant']]) }}"
                    method="GET"
                    class="filter-form"
                >

                    <div class="input-wrap">

                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama produk, SKU, atau kategori..."
                            value="{{ request('search') }}"
                        >

                    </div>

                    <select
                        name="category"
                        class="form-select"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category }}"
                                @selected(request('category') === $category)
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                    <button
                        type="submit"
                        class="btn-filter"
                    >
                        <i class="bi bi-funnel"></i>
                        Filter
                    </button>

                </form>

            </div>


            {{-- PRODUCT TABLE --}}

            <div class="product-card">

                @if ($products->count())

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Produk
                                    </th>

                                    <th>
                                        Kategori
                                    </th>

                                    <th>
                                        Harga Modal
                                    </th>

                                    <th>
                                        Harga Jual
                                    </th>

                                    <th>
                                        Stok
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($products as $product)

                                    <tr>

                                        <td>

                                            <div class="product-name">
                                                {{ $product->name }}
                                            </div>

                                            @if ($product->sku)

                                                <div class="product-sku">
                                                    SKU: {{ $product->sku }}
                                                </div>

                                            @endif

                                        </td>

                                        <td>

                                            @if ($product->category)

                                                <span class="category">
                                                    {{ $product->category }}
                                                </span>

                                            @else

                                                <span style="color: var(--gray-3);">
                                                    —
                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <span class="price">
                                                Rp {{ number_format($product->cost_price, 0, ',', '.') }}
                                            </span>

                                        </td>

                                        <td>

                                            <span class="price">
                                                Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                                            </span>

                                        </td>

                                        <td>

                                            <span
                                                class="
                                                    stock
                                                    @if ($product->stock <= 0)
                                                        empty
                                                    @elseif ($product->stock <= $product->minimum_stock)
                                                        low
                                                    @endif
                                                "
                                            >
                                                {{ number_format($product->stock, 0, ',', '.') }}
                                                {{ $product->unit }}
                                            </span>

                                        </td>

                                        <td>

                                            @if ($product->is_active)

                                                <span class="status active">
                                                    Aktif
                                                </span>

                                            @else

                                                <span class="status inactive">
                                                    Nonaktif
                                                </span>

                                            @endif

                                        </td>

                                        <td>

                                            <div class="actions">

                                                <a
                                                    href="{{ route('products.edit', [
                                                        'idmerchant' => $merchant['idmerchant'],
                                                        'product' => $product->id,
                                                    ]) }}"
                                                    class="action-btn"
                                                    title="Edit Produk"
                                                >
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <form
                                                    action="{{ route('products.destroy', [
                                                        'idmerchant' => $merchant['idmerchant'],
                                                        'product' => $product->id,
                                                    ]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn delete"
                                                        title="Hapus Produk"
                                                    >
                                                        <i class="bi bi-trash3"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    {{-- PAGINATION --}}

                    <div class="pagination">

                        <div class="pagination-info">

                            Menampilkan
                            {{ $products->firstItem() }}
                            -
                            {{ $products->lastItem() }}
                            dari
                            {{ $products->total() }}
                            produk

                        </div>

                        <div class="pagination-links">

                            @if ($products->onFirstPage())

                                <span>
                                    <i class="bi bi-chevron-left"></i>
                                </span>

                            @else

                                <a href="{{ $products->previousPageUrl() }}">
                                    <i class="bi bi-chevron-left"></i>
                                </a>

                            @endif


                            @foreach ($products->getUrlRange(
                                max(1, $products->currentPage() - 2),
                                min($products->lastPage(), $products->currentPage() + 2)
                            ) as $page => $url)

                                @if ($page == $products->currentPage())

                                    <span class="active">
                                        {{ $page }}
                                    </span>

                                @else

                                    <a href="{{ $url }}">
                                        {{ $page }}
                                    </a>

                                @endif

                            @endforeach


                            @if ($products->hasMorePages())

                                <a href="{{ $products->nextPageUrl() }}">
                                    <i class="bi bi-chevron-right"></i>
                                </a>

                            @else

                                <span>
                                    <i class="bi bi-chevron-right"></i>
                                </span>

                            @endif

                        </div>

                    </div>

                @else

                    <div class="empty">

                        <div class="empty-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>

                        <div class="empty-title">
                            Belum Ada Produk
                        </div>

                        <div class="empty-description">
                            Tambahkan produk pertama untuk mulai menggunakan kasir.
                        </div>

                        <div style="margin-top: 18px;">

                            <a
                                href="{{ route('products.create', ['idmerchant' => $merchant['idmerchant']]) }}"
                                class="btn-primary"
                            >
                                <i class="bi bi-plus-lg"></i>
                                Tambah Produk
                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>