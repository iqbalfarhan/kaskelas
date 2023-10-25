<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', fn() => redirect()->route('login'))->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', App\Livewire\Home::class)->name('home');
    Route::get('/profile', App\Livewire\Profile::class)->name('profile');
    Route::middleware('permission:transaksi.index')->get('/transaksi', App\Livewire\Transaksi\Index::class)->name('transaksi.index');
    Route::middleware('permission:transaksi.masuk')->get('/transaksi/masuk', App\Livewire\Transaksi\Masuk::class)->name('transaksi.masuk');
    Route::middleware('permission:transaksi.keluar')->get('/transaksi/keluar', App\Livewire\Transaksi\Keluar::class)->name('transaksi.keluar');
    Route::middleware('permission:user.index')->get('/user', App\Livewire\User\Index::class)->name('user.index');
    Route::middleware('permission:user.show')->get('/user/{user}', App\Livewire\User\Show::class)->name('user.show');
    Route::middleware('permission:kelas.index')->get('/kelas', App\Livewire\Kelas\Index::class)->name('kelas.index');
    Route::middleware('permission:kelas.show')->get('/kelas/{kelas}', App\Livewire\Kelas\Show::class)->name('kelas.show');
    Route::middleware('permission:permission.index')->get('/permission', App\Livewire\Permission\Index::class)->name('permission.index');
});
