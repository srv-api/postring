@extends('layouts.owner')

@section('title', 'Kelola Stok - Tring POS')

@section('page-title', 'Kelola Stok')

@section('page-description', 'Kelola persediaan produk merchant')

@section('stocks-active', 'active')

@push('styles')
<style>
    /* =========================================================
       CONTENT
    ========================================================= */

    .content {
        width: 100%;
        padding: 28px 32px 40px;
    }

    .content-inner {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
    }

    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .page-heading {
        margin-bottom: 0;
    }

    .heading-title {
        color: var(--black);
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .heading-description {
        margin-top: 5px;
        color: var(--gray-2);
        font-size: 11px;
        line-height: 1.5;
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .btn {
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 0 15px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: .15s ease;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-primary {
        background: var(--primary);
        border: 1px solid var(--primary);
        color: var(--white);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
        color: var(--white);
    }

    .btn-outline-primary {
        background: var(--white);
        border: 1px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: var(--white);
    }

    .btn-light {
        background: #F5F5F5;
        border: 1px solid var(--border);
        color: var(--gray-2);
    }

    .btn-light:hover {
        background: #EEEEEE;
        color: var(--gray-1);
    }

    .btn-sm {
        width: 32px;
        height: 32px;
        padding: 0;
        border-radius: 7px;
        font-size: 11px;
    }

    .btn-success {
        background: #16A34A;
        border: 1px solid #16A34A;
        color: var(--white);
    }

    .btn-success:hover {
        background: #15803D;
        border-color: #15803D;
        color: var(--white);
    }

    .btn-danger {
        background: #DC2626;
        border: 1px solid #DC2626;
        color: var(--white);
    }

    .btn-danger:hover {
        background: #B91C1C;
        border-color: #B91C1C;
        color: var(--white);
    }

    /* =========================================================
       ALERT
    ========================================================= */

    .stock-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 12px 14px;
        margin-bottom: 18px;
        border-radius: 9px;
        font-size: 10px;
        line-height: 1.5;
    }

    .stock-alert-success {
        color: #166534;
        background: #F0FDF4;
        border: 1px solid #BBF7D0;
    }

    .stock-alert-danger {
        color: #991B1B;
        background: #FEF2F2;
        border: 1px solid #FECACA;
    }

    .stock-alert ul {
        margin: 0;
        padding-left: 18px;
    }

    .alert-close {
        margin-left: auto;
        border: 0;
        background: transparent;
        font-size: 15px;
        line-height: 1;
        cursor: pointer;
        opacity: .6;
    }

    .alert-close:hover {
        opacity: 1;
    }

    /* =========================================================
       STATISTICS
    ========================================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 20px;
    }

    .stat-card {
        min-width: 0;
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 18px;
    }

    .stat-icon.purple {
        background: #F8EAF7;
        color: #7F0079;
    }

    .stat-icon.blue {
        background: #EAF3FF;
        color: #1677FF;
    }

    .stat-icon.orange {
        background: #FFF3DF;
        color: #F59E0B;
    }

    .stat-icon.red {
        background: #FFE8E8;
        color: #DC3545;
    }

    .stat-label {
        color: var(--gray-2);
        font-size: 9px;
        line-height: 1.4;
    }

    .stat-value {
        margin-top: 3px;
        color: var(--black);
        font-size: 19px;
        font-weight: 800;
    }

    /* =========================================================
       FILTER CARD
    ========================================================= */

    .filter-card {
        width: 100%;
        margin-bottom: 18px;
        padding: 17px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    .filter-grid {
        display: grid;
        grid-template-columns:
            minmax(0, 5fr)
            minmax(160px, 3fr)
            minmax(140px, 2fr)
            auto;
        gap: 9px;
    }

    .input-group {
        display: flex;
        width: 100%;
    }

    .input-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--gray-3);
        background: var(--white);
        border: 1px solid var(--border);
        border-right: 0;
        border-radius: 8px 0 0 8px;
        font-size: 11px;
    }

    .input-group .form-control {
        border-radius: 0 8px 8px 0;
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 40px;
        padding: 0 11px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--gray-1);
        font-size: 10px;
        outline: none;
        transition:
            border-color .15s ease,
            box-shadow .15s ease;
    }

    .form-control::placeholder {
        color: #B5B5B5;
    }

    .form-control:hover,
    .form-select:hover {
        border-color: #D4D4D4;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(127, 0, 121, .08);
    }

    .filter-actions {
        display: flex;
        gap: 7px;
    }

    .filter-actions .btn-primary {
        flex: 1;
    }

    .reset-btn {
        width: 40px;
        padding: 0;
    }

    /* =========================================================
       TABLE CARD
    ========================================================= */

    .table-card {
        width: 100%;
        overflow: hidden;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
    }

    .table-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 20px;
        border-bottom: 1px solid var(--border);
    }

    .table-title {
        color: var(--black);
        font-size: 12px;
        font-weight: 800;
    }

    .table-count {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 9px;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .stock-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
    }

    .stock-table thead th {
        padding: 12px 14px;
        background: #FAFAFA;
        border-bottom: 1px solid var(--border);
        color: var(--gray-2);
        font-size: 9px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .stock-table thead th:first-child {
        padding-left: 20px;
    }

    .stock-table thead th:last-child {
        padding-right: 20px;
        text-align: right;
    }

    .stock-table tbody td {
        padding: 14px;
        border-bottom: 1px solid #F0F0F0;
        color: var(--gray-1);
        font-size: 10px;
        vertical-align: middle;
    }

    .stock-table tbody tr:last-child td {
        border-bottom: none;
    }

    .stock-table tbody tr:hover {
        background: #FCFCFC;
    }

    .stock-table tbody td:first-child {
        padding-left: 20px;
    }

    .stock-table tbody td:last-child {
        padding-right: 20px;
        text-align: right;
    }

    .product-name {
        color: var(--gray-1);
        font-size: 10px;
        font-weight: 700;
    }

    .product-unit {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 8px;
    }

    .stock-number {
        color: var(--black);
        font-size: 11px;
        font-weight: 800;
    }

    .stock-min {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 8px;
    }

    /* =========================================================
       STOCK STATUS
    ========================================================= */

    .stock-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 6px;
        font-size: 8px;
        font-weight: 700;
        white-space: nowrap;
    }

    .stock-status.success {
        background: #DCFCE7;
        color: #15803D;
    }

    .stock-status.warning {
        background: #FEF3C7;
        color: #B45309;
    }

    .stock-status.danger {
        background: #FEE2E2;
        color: #B91C1C;
    }

    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 5px;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        padding: 55px 20px !important;
        text-align: center !important;
    }

    .empty-icon {
        color: var(--gray-3);
        font-size: 32px;
    }

    .empty-title {
        margin-top: 9px;
        color: var(--gray-1);
        font-size: 11px;
        font-weight: 700;
    }

    .empty-description {
        margin-top: 4px;
        color: var(--gray-3);
        font-size: 9px;
    }

    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-wrapper {
        padding: 15px 20px;
        border-top: 1px solid var(--border);
    }

    /* =========================================================
       MODAL
    ========================================================= */

    .modal-content {
        border: 0;
        border-radius: 12px;
        overflow: hidden;
    }

    .modal-header {
        padding: 17px 20px;
        border-bottom: 1px solid var(--border);
    }

    .modal-title {
        color: var(--black);
        font-size: 13px;
        font-weight: 800;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        padding: 14px 20px;
        background: #FAFAFA;
        border-top: 1px solid var(--border);
    }

    .modal-label {
        display: block;
        margin-bottom: 6px;
        color: var(--gray-2);
        font-size: 9px;
        font-weight: 700;
    }

    .modal-product-name {
        color: var(--gray-1);
        font-size: 11px;
        font-weight: 700;
    }

    .modal-group {
        margin-bottom: 15px;
    }

    .modal-group:last-child {
        margin-bottom: 0;
    }

    .modal textarea.form-control {
        height: auto;
        min-height: 75px;
        padding: 10px 11px;
        resize: vertical;
    }

    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 1100px) {
        .content {
            padding-left: 24px;
            padding-right: 24px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .filter-grid {
            grid-template-columns: 1fr 1fr;
        }

        .filter-grid > :first-child {
            grid-column: 1 / -1;
        }
    }

    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 800px) {
        .content {
            padding: 24px 20px 35px;
        }

        .content-inner {
            max-width: none;
        }

        .page-header {
            align-items: stretch;
            flex-direction: column;
        }

        .page-header .btn {
            width: fit-content;
        }
    }

    /* =========================================================
       SMALL MOBILE
    ========================================================= */

    @media (max-width: 600px) {
        .content {
            padding: 20px 15px 30px;
        }

        .heading-title {
            font-size: 21px;
        }

        .heading-description {
            font-size: 10px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .filter-card {
            padding: 13px;
        }

        .filter-grid {
            grid-template-columns: 1fr;
        }

        .filter-grid > :first-child {
            grid-column: auto;
        }

        .filter-actions {
            width: 100%;
        }

        .filter-actions .btn {
            flex: 1;
        }

        .table-header {
            padding: 15px;
        }

        .stock-table tbody td:first-child,
        .stock-table thead th:first-child {
            padding-left: 15px;
        }

        .stock-table tbody td:last-child,
        .stock-table thead th:last-child {
            padding-right: 15px;
        }

        .modal-footer {
            flex-direction: column-reverse;
        }

        .modal-footer .btn {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')

<div class="content-inner">

    {{-- HEADER --}}
    <div class="page-header">

        <div class="page-heading">

            <div class="heading-title">
                Kelola Stok
            </div>

            <div class="heading-description">
                Kelola persediaan produk toko kamu.
            </div>

        </div>

        <a
            href="{{ route('stocks.history', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="btn btn-outline-primary"
        >
            <i class="bi bi-clock-history"></i>
            Riwayat Stok
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="stock-alert stock-alert-success">

            <i class="bi bi-check-circle"></i>

            <div>
                {{ session('success') }}
            </div>

            <button
                type="button"
                class="alert-close"
                onclick="this.parentElement.remove()"
            >
                &times;
            </button>

        </div>

    @endif


    {{-- ERROR --}}
    @if($errors->any())

        <div class="stock-alert stock-alert-danger">

            <i class="bi bi-exclamation-circle"></i>

            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button
                type="button"
                class="alert-close"
                onclick="this.parentElement.remove()"
            >
                &times;
            </button>

        </div>

    @endif


    {{-- STATISTICS --}}
    <div class="stats-grid">

        {{-- TOTAL PRODUK --}}
        <div class="stat-card">

            <div class="stat-icon purple">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <div class="stat-label">
                    Total Produk
                </div>

                <div class="stat-value">
                    {{ number_format($totalProducts) }}
                </div>
            </div>

        </div>


        {{-- TOTAL STOK --}}
        <div class="stat-card">

            <div class="stat-icon blue">
                <i class="bi bi-boxes"></i>
            </div>

            <div>
                <div class="stat-label">
                    Total Stok
                </div>

                <div class="stat-value">
                    {{ number_format($totalStock) }}
                </div>
            </div>

        </div>


        {{-- STOK MENIPIS --}}
        <div class="stat-card">

            <div class="stat-icon orange">
                <i class="bi bi-exclamation-triangle"></i>
            </div>

            <div>
                <div class="stat-label">
                    Stok Menipis
                </div>

                <div class="stat-value">
                    {{ number_format($stockMenipis) }}
                </div>
            </div>

        </div>


        {{-- STOK HABIS --}}
        <div class="stat-card">

            <div class="stat-icon red">
                <i class="bi bi-x-circle"></i>
            </div>

            <div>
                <div class="stat-label">
                    Stok Habis
                </div>

                <div class="stat-value">
                    {{ number_format($stockHabis) }}
                </div>
            </div>

        </div>

    </div>


    {{-- FILTER --}}
    <div class="filter-card">

        <form
            method="GET"
            action="{{ route('stocks.index', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
        >

            <div class="filter-grid">

                {{-- SEARCH --}}
                <div class="input-group">

                    <span class="input-icon">
                        <i class="bi bi-search"></i>
                    </span>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama produk atau SKU..."
                        value="{{ request('search') }}"
                    >

                </div>


                {{-- CATEGORY --}}
                <div>

                    <select
                        name="category"
                        class="form-select"
                    >

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category }}"
                                @selected(request('category') === $category)
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- STOCK STATUS --}}
                <div>

                    <select
                        name="stock_status"
                        class="form-select"
                    >

                        <option value="">
                            Semua Stok
                        </option>

                        <option
                            value="aman"
                            @selected(request('stock_status') === 'aman')
                        >
                            Stok Aman
                        </option>

                        <option
                            value="menipis"
                            @selected(request('stock_status') === 'menipis')
                        >
                            Stok Menipis
                        </option>

                        <option
                            value="habis"
                            @selected(request('stock_status') === 'habis')
                        >
                            Stok Habis
                        </option>

                    </select>

                </div>


                {{-- ACTION --}}
                <div class="filter-actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                    <a
                        href="{{ route('stocks.index', [
                            'idmerchant' => $merchant['idmerchant']
                        ]) }}"
                        class="btn btn-light reset-btn"
                        title="Reset"
                    >
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>

                </div>

            </div>

        </form>

    </div>


    {{-- PRODUCT TABLE --}}
    <div class="table-card">

        <div class="table-header">

            <div>

                <div class="table-title">
                    Persediaan Produk
                </div>

                <div class="table-count">
                    {{ $products->total() }} produk
                </div>

            </div>

        </div>


        <div class="table-responsive">

            <table class="stock-table">

                <thead>

                    <tr>

                        <th>
                            Produk
                        </th>

                        <th>
                            SKU
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Harga Beli
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

                    @forelse($products as $product)

                        @php
                            if ($product->stock <= 0) {
                                $stockClass = 'danger';
                                $stockLabel = 'Habis';
                            } elseif ($product->stock <= $product->minimum_stock) {
                                $stockClass = 'warning';
                                $stockLabel = 'Menipis';
                            } else {
                                $stockClass = 'success';
                                $stockLabel = 'Aman';
                            }
                        @endphp

                        <tr>

                            {{-- PRODUCT --}}
                            <td>

                                <div class="product-name">
                                    {{ $product->name }}
                                </div>

                                <div class="product-unit">
                                    {{ $product->unit }}
                                </div>

                            </td>


                            {{-- SKU --}}
                            <td>
                                {{ $product->sku ?: '-' }}
                            </td>


                            {{-- CATEGORY --}}
                            <td>
                                {{ $product->category ?: '-' }}
                            </td>


                            {{-- COST PRICE --}}
                            <td>
                                Rp {{ number_format($product->cost_price, 0, ',', '.') }}
                            </td>


                            {{-- STOCK --}}
                            <td>

                                <div class="stock-number">
                                    {{ number_format($product->stock) }}
                                    {{ $product->unit }}
                                </div>

                                <div class="stock-min">
                                    Min. {{ number_format($product->minimum_stock) }}
                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <span class="stock-status {{ $stockClass }}">

                                    @if($stockClass === 'success')

                                        <i class="bi bi-check-circle"></i>

                                    @elseif($stockClass === 'warning')

                                        <i class="bi bi-exclamation-circle"></i>

                                    @else

                                        <i class="bi bi-x-circle"></i>

                                    @endif

                                    {{ $stockLabel }}

                                </span>

                            </td>


                            {{-- ACTION --}}
                            <td>

                                <div class="action-buttons">

                                    {{-- TAMBAH STOK --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addStockModal"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-stock="{{ $product->stock }}"
                                    >
                                        <i class="bi bi-plus-lg"></i>
                                    </button>


                                    {{-- KURANGI STOK --}}
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#removeStockModal"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-stock="{{ $product->stock }}"
                                    >
                                        <i class="bi bi-dash-lg"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty-state"
                            >

                                <i class="bi bi-box-seam empty-icon"></i>

                                <div class="empty-title">
                                    Tidak ada produk
                                </div>

                                <div class="empty-description">
                                    Produk yang sesuai filter tidak ditemukan.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($products->hasPages())

            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     MODAL TAMBAH STOK
========================================================= --}}

<div
    class="modal fade"
    id="addStockModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                id="addStockForm"
                method="POST"
            >

                @csrf

                <div class="modal-header">

                    <div class="modal-title">

                        <i class="bi bi-plus-circle text-success me-2"></i>

                        Tambah Stok

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <div class="modal-body">

                    {{-- PRODUCT --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Produk
                        </label>

                        <div
                            id="addProductName"
                            class="modal-product-name"
                        ></div>

                    </div>


                    {{-- CURRENT STOCK --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Stok Saat Ini
                        </label>

                        <input
                            type="text"
                            id="addCurrentStock"
                            class="form-control"
                            readonly
                        >

                    </div>


                    {{-- QUANTITY --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Jumlah Tambah
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            min="1"
                            required
                        >

                    </div>


                    {{-- NOTE --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Keterangan
                        </label>

                        <textarea
                            name="note"
                            class="form-control"
                            rows="3"
                            placeholder="Contoh: Pembelian dari supplier"
                        ></textarea>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        <i class="bi bi-plus-lg"></i>
                        Tambah Stok
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
     MODAL KURANGI STOK
========================================================= --}}

<div
    class="modal fade"
    id="removeStockModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                id="removeStockForm"
                method="POST"
            >

                @csrf

                <div class="modal-header">

                    <div class="modal-title">

                        <i class="bi bi-dash-circle text-danger me-2"></i>

                        Kurangi Stok

                    </div>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>

                </div>


                <div class="modal-body">

                    {{-- PRODUCT --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Produk
                        </label>

                        <div
                            id="removeProductName"
                            class="modal-product-name"
                        ></div>

                    </div>


                    {{-- CURRENT STOCK --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Stok Saat Ini
                        </label>

                        <input
                            type="text"
                            id="removeCurrentStock"
                            class="form-control"
                            readonly
                        >

                    </div>


                    {{-- QUANTITY --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Jumlah Kurang
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            id="removeQuantity"
                            class="form-control"
                            min="1"
                            required
                        >

                    </div>


                    {{-- NOTE --}}
                    <div class="modal-group">

                        <label class="modal-label">
                            Keterangan
                        </label>

                        <textarea
                            name="note"
                            class="form-control"
                            rows="3"
                            placeholder="Contoh: Barang rusak / retur / penyesuaian"
                        ></textarea>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger"
                    >
                        <i class="bi bi-dash-lg"></i>
                        Kurangi Stok
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const idmerchant = @json($merchant['idmerchant']);

    // =========================================================
    // TAMBAH STOK
    // =========================================================

    const addForm = document.getElementById('addStockForm');
    const addProductName = document.getElementById('addProductName');
    const addCurrentStock = document.getElementById('addCurrentStock');

    document.querySelectorAll('[data-bs-target="#addStockModal"]').forEach(function (button) {

        button.addEventListener('click', function () {

            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const stock = this.dataset.stock;

            addProductName.textContent = productName;
            addCurrentStock.value = stock;

            addForm.action =
                `/dashboard/owner/${idmerchant}/stok/${productId}/tambah`;

            console.log('Tambah stok:', addForm.action);
        });

    });


    // =========================================================
    // KURANGI STOK
    // =========================================================

    const removeForm = document.getElementById('removeStockForm');
    const removeProductName = document.getElementById('removeProductName');
    const removeCurrentStock = document.getElementById('removeCurrentStock');
    const removeQuantity = document.getElementById('removeQuantity');

    document.querySelectorAll('[data-bs-target="#removeStockModal"]').forEach(function (button) {

        button.addEventListener('click', function () {

            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const stock = this.dataset.stock;

            removeProductName.textContent = productName;
            removeCurrentStock.value = stock;

            removeQuantity.max = stock;
            removeQuantity.value = '';

            removeForm.action =
                `/dashboard/owner/${idmerchant}/stok/${productId}/kurangi`;

            console.log('Kurangi stok:', removeForm.action);
        });

    });

});
</script>
@endpush

@endsection