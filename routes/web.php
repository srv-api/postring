<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
});


/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

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
    | CRUD Produk
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