@extends('layouts.owner')

@section('title', 'Riwayat Stok - Tring POS')

@section('page-title', 'Riwayat Stok')

@section('page-description', 'Catatan seluruh perubahan stok produk')

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

    .btn-outline-primary {
        background: var(--white);
        border: 1px solid var(--primary);
        color: var(--primary);
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: var(--white);
    }

    .btn-primary {
        background: var(--primary);
        border: 1px solid var(--primary);
        color: var(--white);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        border-color: var(--primary-dark);
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

    .filter-form {
        display: flex;
        gap: 9px;
    }

    .input-group {
        display: flex;
        width: min(100%, 560px);
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

    .form-control {
        width: 100%;
        height: 40px;
        padding: 0 11px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 0 8px 8px 0;
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

    .form-control:hover {
        border-color: #D4D4D4;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(127, 0, 121, .08);
    }

    /* =========================================================
       TABLE
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
        padding: 17px 20px;
        border-bottom: 1px solid var(--border);
    }

    .table-title {
        color: var(--black);
        font-size: 12px;
        font-weight: 800;
    }

    .table-description {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 9px;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .stock-history-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    .stock-history-table thead th {
        padding: 12px 14px;
        background: #FAFAFA;
        border-bottom: 1px solid var(--border);
        color: var(--gray-2);
        font-size: 9px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .stock-history-table thead th:first-child {
        padding-left: 20px;
    }

    .stock-history-table tbody td {
        padding: 14px;
        border-bottom: 1px solid #F0F0F0;
        color: var(--gray-1);
        font-size: 10px;
        vertical-align: middle;
    }

    .stock-history-table tbody tr:last-child td {
        border-bottom: none;
    }

    .stock-history-table tbody tr:hover {
        background: #FCFCFC;
    }

    .stock-history-table tbody td:first-child {
        padding-left: 20px;
    }

    .date-main {
        color: var(--gray-1);
        font-size: 10px;
        font-weight: 700;
    }

    .date-time {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 8px;
    }

    .product-name {
        color: var(--gray-1);
        font-size: 10px;
        font-weight: 700;
    }

    .product-sku {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 8px;
    }

    /* =========================================================
       MOVEMENT TYPE
    ========================================================= */
    .movement-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 6px;
        font-size: 8px;
        font-weight: 700;
        white-space: nowrap;
    }

    .movement-in {
        background: #DCFCE7;
        color: #15803D;
    }

    .movement-out {
        background: #FEE2E2;
        color: #B91C1C;
    }

    .movement-adjustment {
        background: #FEF3C7;
        color: #B45309;
    }

    /* =========================================================
       QUANTITY
    ========================================================= */
    .quantity-in {
        color: #15803D;
        font-size: 11px;
        font-weight: 800;
    }

    .quantity-out {
        color: #B91C1C;
        font-size: 11px;
        font-weight: 800;
    }

    .quantity-adjustment {
        color: #B45309;
        font-size: 11px;
        font-weight: 800;
    }

    /* =========================================================
       STOCK CHANGE
    ========================================================= */
    .stock-change {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--gray-2);
        font-size: 10px;
        white-space: nowrap;
    }

    .stock-change strong {
        color: var(--gray-1);
    }

    .stock-change i {
        color: var(--gray-3);
        font-size: 9px;
    }

    .note {
        max-width: 190px;
        color: var(--gray-2);
        font-size: 9px;
        line-height: 1.5;
    }

    .user-name {
        color: var(--gray-1);
        font-size: 9px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* =========================================================
       EMPTY
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

        .filter-card {
            padding: 13px;
        }

        .filter-form {
            flex-direction: column;
        }

        .input-group {
            width: 100%;
        }

        .filter-form .btn {
            width: 100%;
        }

        .table-header {
            padding: 15px;
        }

        .stock-history-table tbody td:first-child,
        .stock-history-table thead th:first-child {
            padding-left: 15px;
        }
    }
</style>

@endpush

@section('content')

<div class="content-inner">


{{-- HEADER --}}
<div class="page-header">

    <div>

        <div class="heading-title">
            Riwayat Stok
        </div>

        <div class="heading-description">
            Catatan seluruh perubahan stok produk.
        </div>

    </div>

    <a
        href="{{ route('stocks.index', [
            'idmerchant' => $merchant['idmerchant']
        ]) }}"
        class="btn btn-outline-primary"
    >
        <i class="bi bi-box-seam"></i>
        Kelola Stok
    </a>

</div>

{{-- FILTER --}}
<div class="filter-card">

    <form
        method="GET"
        action="{{ route('stocks.history', [
            'idmerchant' => $merchant['idmerchant']
        ]) }}"
        class="filter-form"
    >

        <div class="input-group">

            <span class="input-icon">
                <i class="bi bi-search"></i>
            </span>

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari produk atau SKU..."
                value="{{ request('search') }}"
            >

        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            <i class="bi bi-search"></i>
            Cari
        </button>

    </form>

</div>

{{-- TABLE --}}
<div class="table-card">

    <div class="table-header">

        <div>

            <div class="table-title">
                Riwayat Perubahan Stok
            </div>

            <div class="table-description">
                {{ $movements->total() }} riwayat perubahan stok
            </div>

        </div>

    </div>

    <div class="table-responsive">

        <table class="stock-history-table">

            <thead>

                <tr>

                    <th>
                        Waktu
                    </th>

                    <th>
                        Produk
                    </th>

                    <th>
                        Tipe
                    </th>

                    <th>
                        Jumlah
                    </th>

                    <th>
                        Stok
                    </th>

                    <th>
                        Keterangan
                    </th>

                    <th>
                        User
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($movements as $movement)

                <tr>

                    {{-- WAKTU --}}
                    <td>

                        <div class="date-main">
                            {{ $movement->created_at->format('d/m/Y') }}
                        </div>

                        <div class="date-time">
                            {{ $movement->created_at->format('H:i') }}
                        </div>

                    </td>

                    {{-- PRODUK --}}
                    <td>

                        @if($movement->product)

                            <div class="product-name">
                                {{ $movement->product->name }}
                            </div>

                            <div class="product-sku">
                                {{ $movement->product->sku ?: '-' }}
                            </div>

                        @else

                            <div class="product-sku">
                                Produk dihapus
                            </div>

                        @endif

                    </td>

                    {{-- TIPE --}}
                    <td>

                        @if($movement->type === 'in')

                            <span class="movement-badge movement-in">
                                <i class="bi bi-arrow-down-circle"></i>
                                Stok Masuk
                            </span>

                        @elseif($movement->type === 'out')

                            <span class="movement-badge movement-out">
                                <i class="bi bi-arrow-up-circle"></i>
                                Stok Keluar
                            </span>

                        @else

                            <span class="movement-badge movement-adjustment">
                                <i class="bi bi-sliders"></i>
                                Penyesuaian
                            </span>

                        @endif

                    </td>

                    {{-- JUMLAH --}}
                    <td>

                        @if($movement->type === 'in')

                            <span class="quantity-in">
                                +{{ number_format($movement->quantity) }}
                            </span>

                        @elseif($movement->type === 'out')

                            <span class="quantity-out">
                                -{{ number_format($movement->quantity) }}
                            </span>

                        @else

                            <span class="quantity-adjustment">
                                {{ number_format($movement->quantity) }}
                            </span>

                        @endif

                    </td>

                    {{-- STOK --}}
                    <td>

                        <div class="stock-change">

                            <span>
                                {{ number_format($movement->stock_before) }}
                            </span>

                            <i class="bi bi-arrow-right"></i>

                            <strong>
                                {{ number_format($movement->stock_after) }}
                            </strong>

                        </div>

                    </td>

                    {{-- KETERANGAN --}}
                    <td>

                        <div class="note">
                            {{ $movement->note ?: '-' }}
                        </div>

                    </td>

                    {{-- USER --}}
                    <td>

                        <div class="user-name">
                            {{ $movement->user?->name ?? 'System' }}
                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="empty-state"
                    >

                        <i class="bi bi-clock-history empty-icon"></i>

                        <div class="empty-title">
                            Belum ada riwayat stok
                        </div>

                        <div class="empty-description">
                            Perubahan stok akan muncul di sini.
                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    @if($movements->hasPages())

        <div class="pagination-wrapper">
            {{ $movements->links() }}
        </div>

    @endif

</div>


</div>

@endsection
