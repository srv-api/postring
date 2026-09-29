<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Dashboard\OwnerDashboardController;
use App\Http\Controllers\Dashboard\KasirController;
use App\Http\Controllers\Dashboard\ProductController;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
|
| Hanya bisa diakses oleh user yang belum login.
|
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [
        LoginController::class,
        'showLoginForm',
    ])->name('login');

    Route::post('/login', [
        LoginController::class,
        'login',
    ])
        ->middleware('throttle:5,1')
        ->name('login.store');


    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    Route::get('/register', [
        RegisterController::class,
        'showRegistrationForm',
    ])->name('register');

    Route::post('/register', [
        RegisterController::class,
        'register',
    ])->name('register.store');


    /*
    |--------------------------------------------------------------------------
    | Forgot Password
    |--------------------------------------------------------------------------
    */

    Route::get('/forgot-password', [
        ForgotPasswordController::class,
        'showLinkRequestForm',
    ])->name('password.request');

    Route::post('/forgot-password', [
        ForgotPasswordController::class,
        'sendResetLinkEmail',
    ])
        ->middleware('throttle:5,1')
        ->name('password.email');


    /*
    |--------------------------------------------------------------------------
    | Reset Password
    |--------------------------------------------------------------------------
    */

    Route::get('/reset-password/{token}', [
        ResetPasswordController::class,
        'showResetForm',
    ])->name('password.reset');

    Route::post('/reset-password', [
        ResetPasswordController::class,
        'reset',
    ])
        ->middleware('throttle:5,1')
        ->name('password.update');
});


/*
|--------------------------------------------------------------------------
| Authenticated - Email Verification
|--------------------------------------------------------------------------
|
| User harus login, tetapi belum wajib verified.
|
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Halaman Verifikasi Email
    |--------------------------------------------------------------------------
    */

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');


    /*
    |--------------------------------------------------------------------------
    | Proses Verifikasi Email
    |--------------------------------------------------------------------------
    |
    | URL ini dikirim otomatis melalui email Laravel.
    |
    */

    Route::get('/email/verify/{id}/{hash}', function (
        EmailVerificationRequest $request
    ) {

        $request->fulfill();

        return redirect()
            ->route('dashboard.owner', [
                'idmerchant' => $request->user()->idmerchant,
            ])
            ->with(
                'success',
                'Email berhasil diverifikasi. Selamat datang di Tring POS!'
            );

    })
        ->middleware([
            'signed',
            'throttle:6,1',
        ])
        ->name('verification.verify');


    /*
    |--------------------------------------------------------------------------
    | Kirim Ulang Email Verifikasi
    |--------------------------------------------------------------------------
    */

    Route::post('/email/verification-notification', function (
        Request $request
    ) {

        $request->user()->sendEmailVerificationNotification();

        return back()->with(
            'success',
            'Link verifikasi berhasil dikirim ulang ke email kamu.'
        );

    })
        ->middleware('throttle:6,1')
        ->name('verification.send');
});


/*
|--------------------------------------------------------------------------
| Authenticated & Verified
|--------------------------------------------------------------------------
|
| Semua halaman utama Tring POS hanya dapat diakses
| setelah email user berhasil diverifikasi.
|
*/

Route::middleware([
    'auth',
    'verified',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard Owner
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/owner/{idmerchant}', [
        OwnerDashboardController::class,
        'index',
    ])->name('dashboard.owner');


    /*
    |--------------------------------------------------------------------------
    | Kasir
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/owner/{idmerchant}/kasir', [
        KasirController::class,
        'index',
    ])->name('cashier');


    /*
    |--------------------------------------------------------------------------
    | Produk
    |--------------------------------------------------------------------------
    */

    // Daftar produk
    Route::get('/dashboard/owner/{idmerchant}/produk', [
        ProductController::class,
        'index',
    ])->name('products.index');


    // Form tambah produk
    Route::get('/dashboard/owner/{idmerchant}/produk/create', [
        ProductController::class,
        'create',
    ])->name('products.create');


    // Simpan produk
    Route::post('/dashboard/owner/{idmerchant}/produk', [
        ProductController::class,
        'store',
    ])->name('products.store');


    // Form edit produk
    Route::get('/dashboard/owner/{idmerchant}/produk/{product}/edit', [
        ProductController::class,
        'edit',
    ])->name('products.edit');


    // Update produk
    Route::put('/dashboard/owner/{idmerchant}/produk/{product}', [
        ProductController::class,
        'update',
    ])->name('products.update');


    // Hapus produk
    Route::delete('/dashboard/owner/{idmerchant}/produk/{product}', [
        ProductController::class,
        'destroy',
    ])->name('products.destroy');


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [
        LoginController::class,
        'logout',
    ])->name('logout');
});