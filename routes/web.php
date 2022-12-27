<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundrySettings;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('invoices/{id}', [TransaksiController::class, 'invoices'])->name('invoices');

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('pesanan', TransaksiController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::post('/pelanggan/status/{id}', [PelangganController::class, 'statusActive'])->name('pelanggan.status');

        Route::resource('/layanan', LayananController::class);

        Route::post('/pesanan/store2', [TransaksiController::class, 'store1'])->name('pesanan.store2');
        Route::get('/pesanan/{id}/konfirmasi', [TransaksiController::class, 'konfirmasi'])->name('pesanan.konfirmasi');
        Route::post('pesanan/{id}/update2', [TransaksiController::class, 'updateStatus'])->name('pesanan.updateStatus');
        Route::post('/pesanan/{id}/cancel', [TransaksiController::class, 'cancelPesanan'])->name('pesanan.cancel');
        Route::get('/pesanan/{id}/cetak', [TransaksiController::class, 'cetak'])->name('pesanan.cetak');
        Route::get('/pesanan/{id}/status', [TransaksiController::class, 'statusChange'])->name('pesanan.status');
        Route::post('/pesanan/{id}/status/change', [TransaksiController::class, 'statusChangeStore'])->name('pesanan.changeStatus');

        Route::get('/settings', [LaundrySettings::class, 'index'])->name('settings.index');
        Route::post('/settings', [LaundrySettings::class, 'update'])->name('settings.update');
        Route::post('/settings/notif', [LaundrySettings::class, 'updateNotifikasi'])->name('settings.notif');
        Route::post('/settings/notifikasi', [LaundrySettings::class, 'statusNotifkasi'])->name('settings.notifikasi');

        Route::get('/settings/whatsapp', [WhatsappController::class, 'index'])->name('settings.whatsapp');
        Route::get('/settings/whatsapp/disconnect', [WhatsappController::class, 'disconnect'])->name('settings.whatsapp.disconnect');
    });
});


require __DIR__ . '/auth.php';
