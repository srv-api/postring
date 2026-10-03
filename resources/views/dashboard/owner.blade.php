@extends('layouts.owner')

@section('title', 'Dashboard Owner - Tring POS')

@section('page-title', 'Dashboard')

@section('page-description', 'Ringkasan aktivitas merchant kamu')

@section('content')

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="alert-success">

            <i class="bi bi-check-circle-fill"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- WELCOME --}}
    <div class="welcome">

        <h2>
            Halo, {{ $user->name }}
        </h2>

        <p>
            Kelola bisnis kamu dengan lebih mudah menggunakan Tring POS.
        </p>

    </div>


    {{-- STATISTICS --}}
    <div class="stats">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    Penjualan Hari Ini
                </div>

                <div class="stat-icon">
                    <i class="bi bi-cash-stack"></i>
                </div>

            </div>

            <div class="stat-value">
                Rp 0
            </div>

            <div class="stat-note">
                Belum ada transaksi
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    Transaksi Hari Ini
                </div>

                <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                </div>

            </div>

            <div class="stat-value">
                0
            </div>

            <div class="stat-note">
                Transaksi hari ini
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    Produk
                </div>

                <div class="stat-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

            </div>

            <div class="stat-value">
                0
            </div>

            <div class="stat-note">
                Produk terdaftar
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    Stok Menipis
                </div>

                <div class="stat-icon">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>

            </div>

            <div class="stat-value">
                0
            </div>

            <div class="stat-note">
                Perlu diperiksa
            </div>

        </div>

    </div>


    {{-- DASHBOARD GRID --}}
    <div class="dashboard-grid">

        {{-- QUICK ACTION --}}
        <section class="card">

            <div class="card-header">

                <div>

                    <div class="card-title">
                        Akses Cepat
                    </div>

                    <div class="card-subtitle">
                        Menu yang sering digunakan
                    </div>

                </div>

            </div>


            <div class="quick-actions">

                <a
                    href="{{ route('cashier', ['idmerchant' => $merchant['idmerchant']]) }}"
                    class="quick-action"
                >

                    <div class="quick-action-icon">
                        <i class="bi bi-cart-plus"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Buka Kasir
                        </div>

                        <div class="quick-action-description">
                            Mulai transaksi penjualan
                        </div>

                    </div>

                </a>


                <a
                    href="{{ route('products.create', ['idmerchant' => $merchant['idmerchant']]) }}"
                    class="quick-action"
                >

                    <div class="quick-action-icon">
                        <i class="bi bi-plus-circle"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Tambah Produk
                        </div>

                        <div class="quick-action-description">
                            Tambahkan produk baru
                        </div>

                    </div>

                </a>


          <a
    href="{{ route('stocks.index', ['idmerchant' => $merchant['idmerchant']]) }}"
    class="quick-action"
>

    <div class="quick-action-icon">
        <i class="bi bi-box-arrow-in-down"></i>
    </div>

    <div>

        <div class="quick-action-title">
            Kelola Stok
        </div>

        <div class="quick-action-description">
            Atur stok barang
        </div>

    </div>

</a>


                <a
                    href="#"
                    class="quick-action"
                >

                    <div class="quick-action-icon">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Laporan
                        </div>

                        <div class="quick-action-description">
                            Lihat laporan penjualan
                        </div>

                    </div>

                </a>

            </div>

        </section>


        {{-- MERCHANT INFORMATION --}}
        <section class="card">

            <div class="card-header">

                <div>

                    <div class="card-title">
                        Informasi Merchant
                    </div>

                    <div class="card-subtitle">
                        Informasi akun POS
                    </div>

                </div>

            </div>


            <div class="info-list">

                <div class="info-row">

                    <span class="info-label">
                        Merchant ID
                    </span>

                    <span class="info-value">
                        {{ $merchant['idmerchant'] }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Owner
                    </span>

                    <span class="info-value">
                        {{ $user->name }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Email
                    </span>

                    <span class="info-value">
                        {{ $user->email }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Status
                    </span>

                    <span class="status">
                        Aktif
                    </span>

                </div>

            </div>

        </section>

    </div>

@endsection