@extends('layouts.owner')

@section('title', 'Edit Produk - Tring POS')

@section('page-title', 'Edit Produk')

@section('page-description', 'Perbarui informasi produk merchant')

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
    }

    /* =========================================================
       HEADING
    ========================================================= */
    .page-heading {
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
       FORM
    ========================================================= */
    .form-card {
        width: 100%;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }

    .form-section {
        padding: 22px 24px;
        border-bottom: 1px solid var(--border);
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .section-title {
        color: var(--black);
        font-size: 12px;
        font-weight: 800;
    }

    .section-description {
        margin-top: 4px;
        color: var(--gray-3);
        font-size: 9px;
        line-height: 1.5;
    }

    /* =========================================================
       FORM GRID
    ========================================================= */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
        margin-top: 20px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    /* =========================================================
       LABEL
    ========================================================= */
    .form-label {
        display: block;
        margin-bottom: 7px;
        color: var(--gray-1);
        font-size: 10px;
        font-weight: 700;
    }

    .required {
        color: var(--danger);
    }

    /* =========================================================
       INPUT
    ========================================================= */
    .form-control,
    .form-select {
        width: 100%;
        height: 43px;
        padding: 0 12px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--gray-1);
        font-size: 11px;
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

    /* =========================================================
       HELP
    ========================================================= */
    .form-help {
        margin-top: 5px;
        color: var(--gray-3);
        font-size: 8px;
        line-height: 1.5;
    }

    /* =========================================================
       ERROR
    ========================================================= */
    .error {
        margin-top: 5px;
        color: var(--danger);
        font-size: 9px;
        line-height: 1.4;
    }

    /* =========================================================
       SWITCH
    ========================================================= */
    .switch-wrapper {
        margin-top: 18px;
    }

    .switch-row {
        min-height: 54px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 13px 14px;
        border: 1px solid var(--border);
        border-radius: 9px;
    }

    .switch-title {
        color: var(--gray-1);
        font-size: 10px;
        font-weight: 700;
    }

    .switch-description {
        margin-top: 3px;
        color: var(--gray-3);
        font-size: 8px;
        line-height: 1.5;
    }

    .switch {
        position: relative;
        width: 42px;
        height: 23px;
        display: block;
        flex-shrink: 0;
    }

    .switch input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .slider {
        position: absolute;
        inset: 0;
        background: #D4D4D4;
        border-radius: 30px;
        cursor: pointer;
        transition: .2s;
    }

    .slider::before {
        content: "";
        position: absolute;
        width: 17px;
        height: 17px;
        left: 3px;
        top: 3px;
        background: var(--white);
        border-radius: 50%;
        transition: .2s;
    }

    .switch input:checked + .slider {
        background: var(--primary);
    }

    .switch input:checked + .slider::before {
        transform: translateX(19px);
    }

    /* =========================================================
       ACTIONS
    ========================================================= */
    .form-actions {
        min-height: 70px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 9px;
        padding: 15px 24px;
        background: #FAFAFA;
        border-top: 1px solid var(--border);
    }

    .btn {
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 0 17px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: .15s ease;
        text-decoration: none;
    }

    .btn-secondary {
        background: var(--white);
        border: 1px solid var(--border);
        color: var(--gray-2);
    }

    .btn-secondary:hover {
        background: #F5F5F5;
        color: var(--gray-1);
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
       TABLET
    ========================================================= */
    @media (max-width: 1100px) {
        .content {
            padding-left: 24px;
            padding-right: 24px;
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
    }

    /* =========================================================
       SMALL MOBILE
    ========================================================= */
    @media (max-width: 600px) {
        .content {
            padding: 20px 15px 30px;
        }

        .back {
            margin-bottom: 14px;
        }

        .heading-title {
            font-size: 21px;
        }

        .heading-description {
            font-size: 10px;
        }

        .form-section {
            padding: 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
            padding: 15px 18px;
        }

        .btn {
            width: 100%;
        }
    }
</style>

@endpush

@section('content')

<div class="content-inner">


{{-- PAGE HEADING --}}
<div class="page-heading">
    <div class="heading-title">
        Edit Produk
    </div>

    <div class="heading-description">
        Perbarui informasi produk yang digunakan di Tring POS.
    </div>
</div>

{{-- FORM --}}
<form
    action="{{ route('products.update', [
        'idmerchant' => $merchant['idmerchant'],
        'product' => $product->id
    ]) }}"
    method="POST"
    class="form-card"
>

    @csrf
    @method('PUT')

    {{-- =====================================================
         INFORMASI PRODUK
    ====================================================== --}}
    <section class="form-section">

        <div class="section-title">
            Informasi Produk
        </div>

        <div class="section-description">
            Informasi dasar produk.
        </div>

        <div class="form-grid">

            {{-- NAMA PRODUK --}}
            <div class="form-group full">

                <label class="form-label">
                    Nama Produk
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $product->name) }}"
                    placeholder="Contoh: Kopi Susu Gula Aren"
                    required
                >

                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- SKU --}}
            <div class="form-group">

                <label class="form-label">
                    SKU
                </label>

                <input
                    type="text"
                    name="sku"
                    class="form-control"
                    value="{{ old('sku', $product->sku) }}"
                    placeholder="Contoh: KOPI-001"
                >

                <div class="form-help">
                    SKU digunakan sebagai kode unik produk.
                </div>

                @error('sku')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- KATEGORI --}}
            <div class="form-group">

                <label class="form-label">
                    Kategori
                </label>

                <input
                    type="text"
                    name="category"
                    class="form-control"
                    value="{{ old('category', $product->category) }}"
                    placeholder="Contoh: Minuman"
                >

                @error('category')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- SATUAN --}}
            <div class="form-group">

                <label class="form-label">
                    Satuan
                    <span class="required">*</span>
                </label>

                <select
                    name="unit"
                    class="form-select"
                    required
                >
                    <option
                        value="pcs"
                        @selected(old('unit', $product->unit) === 'pcs')
                    >
                        Pcs
                    </option>

                    <option
                        value="box"
                        @selected(old('unit', $product->unit) === 'box')
                    >
                        Box
                    </option>

                    <option
                        value="pack"
                        @selected(old('unit', $product->unit) === 'pack')
                    >
                        Pack
                    </option>

                    <option
                        value="kg"
                        @selected(old('unit', $product->unit) === 'kg')
                    >
                        Kg
                    </option>

                    <option
                        value="gram"
                        @selected(old('unit', $product->unit) === 'gram')
                    >
                        Gram
                    </option>

                    <option
                        value="liter"
                        @selected(old('unit', $product->unit) === 'liter')
                    >
                        Liter
                    </option>

                    <option
                        value="botol"
                        @selected(old('unit', $product->unit) === 'botol')
                    >
                        Botol
                    </option>

                    <option
                        value="lainnya"
                        @selected(old('unit', $product->unit) === 'lainnya')
                    >
                        Lainnya
                    </option>
                </select>

                @error('unit')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </section>

    {{-- =====================================================
         HARGA
    ====================================================== --}}
    <section class="form-section">

        <div class="section-title">
            Harga
        </div>

        <div class="section-description">
            Tentukan harga modal dan harga jual produk.
        </div>

        <div class="form-grid">

            {{-- HARGA MODAL --}}
            <div class="form-group">

                <label class="form-label">
                    Harga Modal
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="cost_price"
                    class="form-control"
                    value="{{ old('cost_price', $product->cost_price) }}"
                    min="0"
                    step="0.01"
                    required
                >

                @error('cost_price')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- HARGA JUAL --}}
            <div class="form-group">

                <label class="form-label">
                    Harga Jual
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="selling_price"
                    class="form-control"
                    value="{{ old('selling_price', $product->selling_price) }}"
                    min="0"
                    step="0.01"
                    required
                >

                @error('selling_price')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </section>

    {{-- =====================================================
         STOK
    ====================================================== --}}
    <section class="form-section">

        <div class="section-title">
            Stok
        </div>

        <div class="section-description">
            Atur stok produk dan batas minimum stok.
        </div>

        <div class="form-grid">

            {{-- STOK --}}
            <div class="form-group">

                <label class="form-label">
                    Stok
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock', $product->stock) }}"
                    min="0"
                    required
                >

                @error('stock')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- MINIMUM STOK --}}
            <div class="form-group">

                <label class="form-label">
                    Minimum Stok
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="minimum_stock"
                    class="form-control"
                    value="{{ old('minimum_stock', $product->minimum_stock) }}"
                    min="0"
                    required
                >

                <div class="form-help">
                    Peringatan stok menipis akan muncul ketika stok mencapai angka ini.
                </div>

                @error('minimum_stock')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

    </section>

    {{-- =====================================================
         STATUS
    ====================================================== --}}
    <section class="form-section">

        <div class="section-title">
            Status Produk
        </div>

        <div class="section-description">
            Produk aktif dapat digunakan dalam transaksi kasir.
        </div>

        <div class="switch-wrapper">

            <div class="switch-row">

                <div>

                    <div class="switch-title">
                        Produk Aktif
                    </div>

                    <div class="switch-description">
                        Tampilkan produk pada kasir.
                    </div>

                </div>

                <label class="switch">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', $product->is_active))
                    >

                    <span class="slider"></span>

                </label>

            </div>

        </div>

    </section>

    {{-- =====================================================
         ACTION
    ====================================================== --}}
    <div class="form-actions">

        <a
            href="{{ route('products.index', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="btn btn-secondary"
        >
            Batal
        </a>

        <button
            type="submit"
            class="btn btn-primary"
        >
            <i class="bi bi-check-lg"></i>
            Simpan Perubahan
        </button>

    </div>

</form>


</div>

@endsection
