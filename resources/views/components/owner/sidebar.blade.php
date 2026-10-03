<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
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
        text-decoration: none;
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
        letter-spacing: -.7px;
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
        text-transform: uppercase;
        letter-spacing: .8px;
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
        text-decoration: none;
        transition:
            background .2s ease,
            color .2s ease;
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
</style>


<aside class="sidebar">

    {{-- =========================================
        HEADER / BRAND
    ========================================== --}}
    <div class="sidebar-header">

        <a
            href="{{ route('dashboard.owner', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
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


    {{-- =========================================
        MENU
    ========================================== --}}
    <nav class="sidebar-menu">


        {{-- =====================================
            UTAMA
        ====================================== --}}
        <div class="menu-label">
            Utama
        </div>


        {{-- DASHBOARD --}}
        <a
            href="{{ route('dashboard.owner', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="menu-item {{ request()->routeIs('dashboard.owner') ? 'active' : '' }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        {{-- =====================================
            OPERASIONAL
        ====================================== --}}
        <div
            class="menu-label"
            style="margin-top: 25px;"
        >
            Operasional
        </div>


        {{-- KELOLA KASIR --}}
        <a
            href="{{ route('cashier', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="menu-item {{ request()->routeIs('cashier.*') ? 'active' : '' }}"
        >

            <i class="bi bi-person-workspace"></i>

            <span>
                Kelola Kasir
            </span>

        </a>


        {{-- PRODUK --}}
        <a
            href="{{ route('products.index', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="menu-item {{ request()->routeIs('products.*') ? 'active' : '' }}"
        >

            <i class="bi bi-box-seam"></i>

            <span>
                Produk
            </span>

        </a>


        {{-- STOK --}}
        <a
            href="{{ route('stocks.index', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="menu-item {{ request()->routeIs('stocks.*') ? 'active' : '' }}"
        >

            <i class="bi bi-archive"></i>

            <span>
                Stok
            </span>

        </a>


        {{-- PELANGGAN --}}
        <a
            href="#"
            class="menu-item"
        >

            <i class="bi bi-people"></i>

            <span>
                Pelanggan
            </span>

        </a>



        {{-- =====================================
            LAPORAN
        ====================================== --}}
        <div
            class="menu-label"
            style="margin-top: 25px;"
        >
            Laporan
        </div>


        {{-- TRANSAKSI --}}
        <a
            href="#"
            class="menu-item"
        >

            <i class="bi bi-receipt"></i>

            <span>
                Transaksi
            </span>

        </a>


        {{-- LAPORAN PENJUALAN --}}
        <a
            href="#"
            class="menu-item"
        >

            <i class="bi bi-bar-chart"></i>

            <span>
                Laporan Penjualan
            </span>

        </a>



        {{-- =====================================
            PENGATURAN
        ====================================== --}}
        <div
            class="menu-label"
            style="margin-top: 25px;"
        >
            Pengaturan
        </div>


        {{-- MERCHANT --}}
        <a
            href="#"
            class="menu-item"
        >

            <i class="bi bi-shop"></i>

            <span>
                Merchant
            </span>

        </a>


        {{-- PENGGUNA --}}
        <a
            href="#"
            class="menu-item"
        >

            <i class="bi bi-person-badge"></i>

            <span>
                Pengguna
            </span>

        </a>

    </nav>



    {{-- =========================================
        FOOTER
    ========================================== --}}
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