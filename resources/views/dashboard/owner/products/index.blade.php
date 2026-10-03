@extends('layouts.owner')

@section('title', 'Produk - Tring POS')

@section('page-title', 'Produk')

@section('page-description', 'Kelola produk dan harga jual merchant')

@section('products-active', 'active')

@push('styles')
<style>

    /* =========================
       PRODUCT PAGE
    ========================= */

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


    /* =========================
       BUTTON
    ========================= */

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
        text-decoration: none;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        color: white;
    }


    /* =========================
       FILTER
    ========================= */

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

        cursor: pointer;
    }

    .btn-filter:hover {
        background: var(--primary-light);
        border-color: rgba(127, 0, 121, .2);
        color: var(--primary);
    }


    /* =========================
       PRODUCT TABLE
    ========================= */

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


    /* =========================
       PRODUCT
    ========================= */

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


    /* =========================
       STOCK
    ========================= */

    .stock {
        font-weight: 700;
    }

    .stock.low {
        color: var(--warning);
    }

    .stock.empty {
        color: var(--danger);
    }


    /* =========================
       STATUS
    ========================= */

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


    /* =========================
       ACTION
    ========================= */

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

        cursor: pointer;
        text-decoration: none;

        transition: .2s;
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


    /* =========================
       EMPTY
    ========================= */

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


    /* =========================
       PAGINATION
    ========================= */

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

        text-decoration: none;
    }

    .pagination-links a {
        color: var(--gray-1);
    }

    .pagination-links a:hover {
        background: var(--primary-light);
        border-color: rgba(127,0,121,.2);
        color: var(--primary);
    }

    .pagination-links .active {
        background: var(--primary);
        border-color: var(--primary);
        color: white;
    }


    /* =========================
       ALERT
    ========================= */

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


    /* =========================
       DELETE MODAL
    ========================= */


    .delete-modal-body {
        padding: 24px 22px;
        text-align: center;
    }

    .delete-modal-title {
        color: var(--black);
        font-size: 14px;
        font-weight: 800;
    }

    .delete-modal-description {
        margin-top: 7px;

        color: var(--gray-2);

        font-size: 10px;
        line-height: 1.6;
    }

    .delete-product-name {
        display: inline-block;

        max-width: 100%;

        margin-top: 10px;
        padding: 7px 10px;

        border-radius: 7px;

        background: #F7F7F8;
        color: var(--gray-1);

        font-size: 10px;
        font-weight: 700;

        word-break: break-word;
    }

    .delete-modal-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 8px;

        padding: 14px 20px;

        background: #FAFAFA;

        border-top: 1px solid var(--border);
    }

    .btn-delete {
        height: 40px;

        padding: 0 17px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border: 1px solid var(--danger);
        border-radius: 8px;

        background: var(--danger);
        color: white;

        font-size: 10px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s;
    }

    .btn-delete:hover {
        background: #B91C1C;
        border-color: #B91C1C;
        color: white;
    }

    .delete-modal-footer .btn-filter {
        height: 40px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .filter-form {
            grid-template-columns: 1fr;
        }

        .filter-form .btn-filter {
            width: 100%;
        }
    }

    @media (max-width: 800px) {

        .page-heading {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 550px) {

        .heading-title {
            font-size: 21px;
        }

        .btn-primary {
            width: 100%;
        }

        .page-heading {
            gap: 15px;
        }

        .delete-modal-footer {
            flex-direction: column-reverse;
        }

        .delete-modal-footer .btn-filter,
        .delete-modal-footer .btn-delete {
            width: 100%;
        }
    }

</style>
@endpush


@section('content')

    {{-- =========================
         ALERT SUCCESS
    ========================= --}}
    @if (session('success'))

        <div class="alert alert-success">
            <i class="bi bi-check-circle"></i>

            <span>
                {{ session('success') }}
            </span>
        </div>

    @endif


    {{-- =========================
         ALERT ERROR
    ========================= --}}
    @if (session('error'))

        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle"></i>

            <span>
                {{ session('error') }}
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
            href="{{ route('products.create', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
            class="btn-primary"
        >
            <i class="bi bi-plus-lg"></i>
            Tambah Produk
        </a>

    </div>


    {{-- FILTER --}}
    <div class="filter-card">

        <form
            action="{{ route('products.index', [
                'idmerchant' => $merchant['idmerchant']
            ]) }}"
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

                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga Modal</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($products as $product)

                            <tr>

                                {{-- PRODUK --}}
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


                                {{-- KATEGORI --}}
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


                                {{-- HARGA MODAL --}}
                                <td>

                                    <span class="price">
                                        Rp {{ number_format(
                                            $product->cost_price,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </span>

                                </td>


                                {{-- HARGA JUAL --}}
                                <td>

                                    <span class="price">
                                        Rp {{ number_format(
                                            $product->selling_price,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </span>

                                </td>


                                {{-- STOK --}}
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
                                        {{ number_format(
                                            $product->stock,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                        {{ $product->unit }}
                                    </span>

                                </td>


                                {{-- STATUS --}}
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


                                {{-- AKSI --}}
                                <td>

                                    <div class="actions">

                                        {{-- EDIT --}}
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


                                        {{-- DELETE --}}
                                        <button
                                            type="button"
                                            class="action-btn delete"
                                            title="Hapus Produk"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteProductModal"
                                            data-product-name="{{ $product->name }}"
                                            data-delete-url="{{ route('products.destroy', [
                                                'idmerchant' => $merchant['idmerchant'],
                                                'product' => $product->id,
                                            ]) }}"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>

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

                    {{-- PREVIOUS --}}
                    @if ($products->onFirstPage())

                        <span>
                            <i class="bi bi-chevron-left"></i>
                        </span>

                    @else

                        <a href="{{ $products->previousPageUrl() }}">
                            <i class="bi bi-chevron-left"></i>
                        </a>

                    @endif


                    {{-- PAGE NUMBER --}}
                    @foreach (
                        $products->getUrlRange(
                            max(1, $products->currentPage() - 2),
                            min(
                                $products->lastPage(),
                                $products->currentPage() + 2
                            )
                        ) as $page => $url
                    )

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


                    {{-- NEXT --}}
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

            {{-- EMPTY --}}
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
                        href="{{ route('products.create', [
                            'idmerchant' => $merchant['idmerchant']
                        ]) }}"
                        class="btn-primary"
                    >
                        <i class="bi bi-plus-lg"></i>
                        Tambah Produk
                    </a>

                </div>

            </div>

        @endif

    </div>


    {{-- =========================
         DELETE PRODUCT MODAL
    ========================= --}}
    <div
        class="modal fade"
        id="deleteProductModal"
        tabindex="-1"
        aria-labelledby="deleteProductModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <form
                    id="deleteProductForm"
                    method="POST"
                >

                    @csrf
                    @method('DELETE')


                    {{-- MODAL BODY --}}
                    <div class="delete-modal-body">

                        <div
                            id="deleteProductModalLabel"
                            class="delete-modal-title"
                        >
                            Hapus Produk?
                        </div>


                        <div class="delete-modal-description">

                            Produk berikut akan dihapus dari merchant kamu.
                            Tindakan ini tidak dapat dibatalkan.

                        </div>


                        <div
                            id="deleteProductName"
                            class="delete-product-name"
                        >
                        </div>

                    </div>


                    {{-- MODAL FOOTER --}}
                    <div class="delete-modal-footer">

                        <button
                            type="button"
                            class="btn-filter"
                            data-bs-dismiss="modal"
                        >
                            Batal
                        </button>


                        <button
                            type="submit"
                            class="btn-delete"
                        >
                            <i class="bi bi-trash3"></i>
                            Hapus Produk
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection


@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', function () {

        const deleteModal =
            document.getElementById('deleteProductModal');

        const deleteForm =
            document.getElementById('deleteProductForm');

        const deleteProductName =
            document.getElementById('deleteProductName');


        if (!deleteModal || !deleteForm || !deleteProductName) {
            return;
        }


        deleteModal.addEventListener(
            'show.bs.modal',
            function (event) {

                const button = event.relatedTarget;

                if (!button) {
                    return;
                }


                const productName =
                    button.getAttribute('data-product-name');

                const deleteUrl =
                    button.getAttribute('data-delete-url');


                deleteProductName.textContent =
                    productName || 'Produk ini';


                deleteForm.action =
                    deleteUrl || '';

            }
        );

    });

</script>
@endpush
```
