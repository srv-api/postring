
@extends('layouts.app')

@section('title', 'Tring POS - Solusi Kasir Digital untuk Bisnis')

@section('topup-active', '')

@push('styles')
<style>
/* =====================================================
   TRING POS HOME
===================================================== */

.pos-page {
    width: 100%;
    overflow: hidden;
    background: var(--white);
}

.pos-container {
    width: 100%;
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 24px;
}

/* HERO */

.pos-hero {
    position: relative;
    padding: 75px 0 85px;
    background:
        radial-gradient(
            circle at 85% 20%,
            rgba(255,255,255,.14),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #650061 0%,
            #7F0079 55%,
            #A91AA2 100%
        );
    color: #fff;
}

.pos-hero::before {
    content: "";
    position: absolute;
    width: 380px;
    height: 380px;
    right: -100px;
    bottom: -220px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 50%;
}

.pos-hero::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    right: 30px;
    bottom: -190px;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
}

.pos-hero-grid {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 65px;
}

.pos-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 13px;
    margin-bottom: 22px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 30px;
    background: rgba(255,255,255,.10);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .5px;
}

.pos-label i {
    color: #FFD76A;
}

.pos-hero h1 {
    max-width: 590px;
    margin-bottom: 20px;
    color: #fff;
    font-size: clamp(34px, 4vw, 53px);
    font-weight: 850;
    line-height: 1.13;
    letter-spacing: -2px;
}

.pos-hero h1 span {
    color: #FFD76A;
}

.pos-hero-description {
    max-width: 490px;
    margin-bottom: 28px;
    color: rgba(255,255,255,.78);
    font-size: 13px;
    line-height: 1.9;
}

.pos-hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 12px;
}

.pos-btn {
    min-height: 47px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 0 22px;
    border: 1px solid transparent;
    border-radius: 9px;
    text-decoration: none;
    font-size: 11px;
    font-weight: 800;
    transition: .2s ease;
}

.pos-btn-primary {
    background: #fff;
    color: #7F0079;
}

.pos-btn-primary:hover {
    background: #FFF0FC;
    color: #650061;
    transform: translateY(-2px);
}

.pos-btn-outline {
    border-color: rgba(255,255,255,.4);
    color: #fff;
    background: transparent;
}

.pos-btn-outline:hover {
    background: rgba(255,255,255,.12);
    color: #fff;
}

/* HERO VISUAL */

.pos-visual {
    position: relative;
    min-width: 0;
    padding: 15px;
}

.pos-dashboard {
    position: relative;
    padding: 23px;
    border: 1px solid rgba(255,255,255,.3);
    border-radius: 20px;
    background: rgba(255,255,255,.97);
    box-shadow: 0 30px 80px rgba(35,0,34,.25);
    color: #29212B;
    transform: rotate(-1deg);
}

.pos-dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding-bottom: 18px;
    border-bottom: 1px solid #F0EAF0;
}

.pos-dashboard-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.pos-brand-icon {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #F8EAF7;
    color: #7F0079;
    font-size: 18px;
}

.pos-dashboard-brand strong {
    display: block;
    font-size: 12px;
    font-weight: 850;
}

.pos-dashboard-brand small {
    display: block;
    margin-top: 3px;
    color: #96909A;
    font-size: 9px;
}

.pos-status {
    padding: 6px 9px;
    border-radius: 20px;
    background: #E9F9EF;
    color: #18864B;
    font-size: 9px;
    font-weight: 800;
}

.pos-dashboard-title {
    margin: 22px 0 15px;
    font-size: 15px;
    font-weight: 850;
}

.pos-summary {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.pos-summary-card {
    padding: 15px;
    border: 1px solid #F0EAF0;
    border-radius: 12px;
    background: #fff;
}

.pos-summary-card small {
    display: block;
    margin-bottom: 8px;
    color: #96909A;
    font-size: 9px;
}

.pos-summary-card strong {
    display: block;
    color: #302630;
    font-size: 19px;
    font-weight: 850;
}

.pos-summary-card span {
    display: inline-block;
    margin-top: 7px;
    color: #18864B;
    font-size: 9px;
}

.pos-chart {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 10px;
    height: 100px;
    padding: 17px 10px 0;
    margin-top: 17px;
    border-bottom: 1px solid #F0EAF0;
}

.pos-chart-bar {
    flex: 1;
    max-width: 30px;
    border-radius: 5px 5px 0 0;
    background: #E8C9E6;
}

.pos-chart-bar.active {
    background: #7F0079;
}

.pos-chart-labels {
    display: flex;
    justify-content: space-between;
    padding: 8px 10px 0;
    color: #A49BA5;
    font-size: 8px;
}

.pos-transaction-title {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    margin-bottom: 12px;
    font-size: 11px;
    font-weight: 800;
}

.pos-transaction-title span {
    color: #7F0079;
    font-size: 9px;
}

.pos-transaction {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    padding: 10px 0;
    border-top: 1px solid #F3EEF3;
}

.pos-transaction-info {
    display: flex;
    align-items: center;
    gap: 9px;
}

.pos-transaction-icon {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #F8EAF7;
    color: #7F0079;
}

.pos-transaction-info strong {
    display: block;
    font-size: 9px;
}

.pos-transaction-info small {
    display: block;
    margin-top: 4px;
    color: #A49BA5;
    font-size: 8px;
}

.pos-transaction-price {
    font-size: 10px;
    font-weight: 800;
}

/* FLOATING CARD */

.pos-floating-card {
    position: absolute;
    right: -5px;
    bottom: 45px;
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 14px 17px;
    border: 1px solid #F0EAF0;
    border-radius: 13px;
    background: #fff;
    box-shadow: 0 15px 35px rgba(35,0,34,.15);
    color: #29212B;
}

.pos-floating-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #E9F9EF;
    color: #18864B;
    font-size: 17px;
}

.pos-floating-card strong {
    display: block;
    font-size: 11px;
}

.pos-floating-card small {
    display: block;
    margin-top: 4px;
    color: #96909A;
    font-size: 9px;
}

/* TRUST STRIP */

.pos-trust {
    position: relative;
    z-index: 2;
    padding: 22px 0;
    border-bottom: 1px solid var(--border);
    background: #fff;
}

.pos-trust-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.pos-trust-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 11px;
    color: #514752;
    font-size: 11px;
    font-weight: 700;
}

.pos-trust-item i {
    color: #7F0079;
    font-size: 19px;
}

/* SECTION GENERAL */

.pos-section {
    padding: 80px 0;
}

.pos-section-heading {
    max-width: 650px;
    margin: 0 auto 42px;
    text-align: center;
}

.pos-section-label {
    display: inline-block;
    margin-bottom: 12px;
    color: #7F0079;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.pos-section-heading h2 {
    margin-bottom: 13px;
    color: var(--black);
    font-size: clamp(25px, 3vw, 35px);
    font-weight: 850;
    line-height: 1.2;
    letter-spacing: -1px;
}

.pos-section-heading p {
    color: var(--gray-3);
    font-size: 12px;
    line-height: 1.8;
}

/* FEATURES */

.pos-features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.pos-feature {
    padding: 27px;
    border: 1px solid var(--border);
    border-radius: 15px;
    background: var(--white);
    transition: .2s ease;
}

.pos-feature:hover {
    transform: translateY(-4px);
    border-color: rgba(127,0,121,.25);
    box-shadow: 0 15px 35px rgba(0,0,0,.05);
}

.pos-feature-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 21px;
    border-radius: 13px;
    background: #F8EAF7;
    color: #7F0079;
    font-size: 22px;
}

.pos-feature h3 {
    margin-bottom: 10px;
    color: var(--black);
    font-size: 14px;
    font-weight: 850;
}

.pos-feature p {
    margin: 0;
    color: var(--gray-3);
    font-size: 11px;
    line-height: 1.8;
}

/* HOW IT WORKS */

.pos-steps-section {
    background: #FAF7FA;
}

.pos-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.pos-step {
    position: relative;
    padding: 28px;
    border: 1px solid #F0EAF0;
    border-radius: 15px;
    background: #fff;
}

.pos-step-number {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 19px;
    border-radius: 12px;
    background: #7F0079;
    color: #fff;
    font-size: 14px;
    font-weight: 850;
}

.pos-step h3 {
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: 850;
}

.pos-step p {
    margin: 0;
    color: var(--gray-3);
    font-size: 11px;
    line-height: 1.8;
}

/* CTA */

.pos-cta {
    padding: 65px 0;
}

.pos-cta-box {
    position: relative;
    overflow: hidden;
    padding: 48px 35px;
    border-radius: 20px;
    background: linear-gradient(135deg, #650061, #8E0788);
    color: #fff;
    text-align: center;
}

.pos-cta-box::before {
    content: "";
    position: absolute;
    width: 250px;
    height: 250px;
    top: -140px;
    left: -80px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 50%;
}

.pos-cta-box h2 {
    position: relative;
    margin-bottom: 13px;
    color: #fff;
    font-size: clamp(24px, 3vw, 34px);
    font-weight: 850;
    letter-spacing: -1px;
}

.pos-cta-box p {
    position: relative;
    max-width: 560px;
    margin: 0 auto 25px;
    color: rgba(255,255,255,.78);
    font-size: 12px;
    line-height: 1.8;
}

.pos-cta-box .pos-btn {
    position: relative;
}

/* RESPONSIVE */

@media (max-width: 1000px) {
    .pos-hero-grid {
        gap: 30px;
    }

    .pos-hero h1 {
        font-size: 38px;
    }

    .pos-features,
    .pos-steps {
        gap: 14px;
    }

    .pos-feature,
    .pos-step {
        padding: 22px;
    }
}

@media (max-width: 760px) {
    .pos-container {
        padding: 0 17px;
    }

    .pos-hero {
        padding: 55px 0 65px;
    }

    .pos-hero-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .pos-hero h1 {
        max-width: 520px;
        font-size: 36px;
    }

    .pos-hero-description {
        font-size: 12px;
    }

    .pos-visual {
        max-width: 500px;
        width: 100%;
        margin: 0 auto;
        padding: 8px 5px 35px;
    }

    .pos-dashboard {
        padding: 18px;
    }

    .pos-floating-card {
        right: 0;
        bottom: 5px;
    }

    .pos-trust-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .pos-trust-item {
        justify-content: flex-start;
    }

    .pos-section {
        padding: 60px 0;
    }

    .pos-features,
    .pos-steps {
        grid-template-columns: 1fr;
    }

    .pos-section-heading {
        margin-bottom: 30px;
    }

    .pos-cta {
        padding: 45px 0;
    }

    .pos-cta-box {
        padding: 38px 20px;
    }
}

@media (max-width: 420px) {
    .pos-hero h1 {
        font-size: 31px;
    }

    .pos-hero-actions {
        align-items: stretch;
        flex-direction: column;
    }

    .pos-btn {
        width: 100%;
    }

    .pos-summary-card {
        padding: 12px;
    }

    .pos-summary-card strong {
        font-size: 16px;
    }

    .pos-dashboard {
        padding: 14px;
    }

    .pos-floating-card {
        padding: 11px;
    }
}
</style>
@endpush

@section('content')

<div class="pos-page">

    {{-- HERO --}}

    <section class="pos-hero">
        <div class="pos-container">
            <div class="pos-hero-grid">

                <div class="pos-hero-content">

                    <div class="pos-label">
                        <i class="bi bi-stars"></i>
                        TRING POS · SOLUSI BISNIS DIGITAL
                    </div>

                    <h1>
                        Kelola Bisnis Lebih Mudah dengan
                        <span>Tring POS</span>
                    </h1>

                    <p class="pos-hero-description">
                        Sistem kasir digital untuk membantu bisnis
                        mengelola transaksi, memantau penjualan,
                        dan menjalankan operasional dengan lebih praktis.
                    </p>

                    <div class="pos-hero-actions">

                        <a href="#fitur" class="pos-btn pos-btn-primary">
                            Jelajahi Fitur
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="#cara-kerja" class="pos-btn pos-btn-outline">
                            <i class="bi bi-play-circle"></i>
                            Cara Kerja
                        </a>

                    </div>

                </div>

                {{-- DASHBOARD MOCKUP --}}

                <div class="pos-visual">

                    <div class="pos-dashboard">

                        <div class="pos-dashboard-header">

                            <div class="pos-dashboard-brand">

                                <div class="pos-brand-icon">
                                    <i class="bi bi-shop"></i>
                                </div>

                                <div>
                                    <strong>Tring POS</strong>
                                    <small>Dashboard Bisnis</small>
                                </div>

                            </div>

                            <span class="pos-status">
                                <i class="bi bi-circle-fill"></i>
                                Dashboard
                            </span>

                        </div>

                        <h3 class="pos-dashboard-title">
                            Ringkasan Penjualan
                        </h3>

                        <div class="pos-summary">

                            <div class="pos-summary-card">
                                <small>Total Penjualan</small>
                                <strong>Rp 0</strong>
                                <span>
                                    <i class="bi bi-graph-up"></i>
                                    Ringkasan transaksi
                                </span>
                            </div>

                            <div class="pos-summary-card">
                                <small>Total Transaksi</small>
                                <strong>0</strong>
                                <span>
                                    <i class="bi bi-receipt"></i>
                                    Transaksi tercatat
                                </span>
                            </div>

                        </div>

                        <div class="pos-chart">

                            <div class="pos-chart-bar" style="height:35%"></div>
                            <div class="pos-chart-bar" style="height:55%"></div>
                            <div class="pos-chart-bar" style="height:42%"></div>
                            <div class="pos-chart-bar active" style="height:75%"></div>
                            <div class="pos-chart-bar" style="height:60%"></div>
                            <div class="pos-chart-bar" style="height:90%"></div>
                            <div class="pos-chart-bar" style="height:68%"></div>

                        </div>

                        <div class="pos-chart-labels">
                            <span>Sen</span>
                            <span>Sel</span>
                            <span>Rab</span>
                            <span>Kam</span>
                            <span>Jum</span>
                            <span>Sab</span>
                            <span>Min</span>
                        </div>

                        <div class="pos-transaction-title">
                            <span>Aktivitas Transaksi</span>
                            <span>Contoh tampilan</span>
                        </div>

                        <div class="pos-transaction">

                            <div class="pos-transaction-info">

                                <div class="pos-transaction-icon">
                                    <i class="bi bi-cup-hot"></i>
                                </div>

                                <div>
                                    <strong>Penjualan Produk</strong>
                                    <small>Contoh transaksi</small>
                                </div>

                            </div>

                            <div class="pos-transaction-price">
                                Rp 0
                            </div>

                        </div>

                        <div class="pos-transaction">

                            <div class="pos-transaction-info">

                                <div class="pos-transaction-icon">
                                    <i class="bi bi-bag-check"></i>
                                </div>

                                <div>
                                    <strong>Transaksi Kasir</strong>
                                    <small>Contoh transaksi</small>
                                </div>

                            </div>

                            <div class="pos-transaction-price">
                                Rp 0
                            </div>

                        </div>

                    </div>

                    <div class="pos-floating-card">

                        <div class="pos-floating-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>
                            <strong>Transaksi Tercatat</strong>
                            <small>Kelola penjualan lebih praktis</small>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- TRUST STRIP --}}

    <section class="pos-trust">
        <div class="pos-container">

            <div class="pos-trust-grid">

                <div class="pos-trust-item">
                    <i class="bi bi-receipt"></i>
                    <span>Pencatatan Transaksi</span>
                </div>

                <div class="pos-trust-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Pengelolaan Produk</span>
                </div>

                <div class="pos-trust-item">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>Ringkasan Penjualan</span>
                </div>

            </div>

        </div>
    </section>


    {{-- FITUR --}}

    <section class="pos-section" id="fitur">
        <div class="pos-container">

            <div class="pos-section-heading">

                <span class="pos-section-label">
                    Fitur Tring POS
                </span>

                <h2>
                    Semua Kebutuhan Bisnis dalam Satu Sistem
                </h2>

                <p>
                    Bantu operasional bisnis menjadi lebih teratur
                    dengan fitur kasir dan pengelolaan usaha.
                </p>

            </div>

            <div class="pos-features">

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-calculator"></i>
                    </div>

                    <h3>Sistem Kasir Digital</h3>

                    <p>
                        Catat transaksi penjualan dan bantu proses
                        pembayaran pelanggan melalui sistem kasir.
                    </p>

                </article>

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h3>Manajemen Produk</h3>

                    <p>
                        Kelola informasi produk, harga, dan data
                        barang agar lebih mudah ditemukan.
                    </p>

                </article>

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <h3>Laporan Penjualan</h3>

                    <p>
                        Pantau ringkasan transaksi dan penjualan
                        untuk membantu evaluasi kegiatan bisnis.
                    </p>

                </article>

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>

                    <h3>Riwayat Transaksi</h3>

                    <p>
                        Telusuri transaksi yang telah dicatat
                        untuk memudahkan pengecekan penjualan.
                    </p>

                </article>

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <h3>Kelola Toko</h3>

                    <p>
                        Bantu pengelolaan informasi usaha dan
                        kegiatan operasional toko.
                    </p>

                </article>

                <article class="pos-feature">

                    <div class="pos-feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>

                    <h3>Tampilan Responsif</h3>

                    <p>
                        Akses halaman Tring POS melalui perangkat
                        desktop, tablet, maupun ponsel.
                    </p>

                </article>

            </div>

        </div>
    </section>


    {{-- CARA KERJA --}}

    <section class="pos-section pos-steps-section" id="cara-kerja">
        <div class="pos-container">

            <div class="pos-section-heading">

                <span class="pos-section-label">
                    Cara Kerja
                </span>

                <h2>
                    Mulai Kelola Bisnis dengan Lebih Praktis
                </h2>

                <p>
                    Kenali alur penggunaan Tring POS untuk
                    membantu kegiatan operasional usaha.
                </p>

            </div>

            <div class="pos-steps">

                <article class="pos-step">

                    <div class="pos-step-number">01</div>

                    <h3>Siapkan Data Produk</h3>

                    <p>
                        Masukkan informasi produk dan harga
                        yang akan digunakan dalam transaksi.
                    </p>

                </article>

                <article class="pos-step">

                    <div class="pos-step-number">02</div>

                    <h3>Catat Transaksi</h3>

                    <p>
                        Gunakan sistem kasir untuk mencatat
                        produk yang dibeli pelanggan.
                    </p>

                </article>

                <article class="pos-step">

                    <div class="pos-step-number">03</div>

                    <h3>Pantau Penjualan</h3>

                    <p>
                        Periksa riwayat transaksi dan ringkasan
                        penjualan untuk memantau kegiatan usaha.
                    </p>

                </article>

            </div>

        </div>
    </section>


    {{-- CTA --}}

    <section class="pos-cta">
        <div class="pos-container">

            <div class="pos-cta-box">

                <h2>
                    Saatnya Bisnis Kamu Beralih ke Digital
                </h2>

                <p>
                    Kenali Tring POS dan temukan cara yang lebih
                    praktis untuk membantu mengelola usaha kamu.
                </p>

                <a href="#fitur" class="pos-btn pos-btn-primary">
                    Kenali Tring POS
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>
    </section>

</div>

@endsection