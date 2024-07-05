<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

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

// route auth
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

// cek auth login
Route::get('cek', function () {
    // Auth::logout();
    dd(Auth::user());
});

Route::middleware(['auth', 'role:superadmin|admin|storeman'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);


    // ini rute dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // route master barang

    Route::middleware(['role:superadmin|admin'])->group(function () {

        Route::resource('/master/barang', BarangController::class);
        Route::get('/barang/export', [BarangController::class, 'export'])->name('barang-export');
        Route::post('/barang/import', [BarangController::class, 'import'])->name('barang-import');
        Route::resource('/setting', SettingController::class);
    });
    Route::get('selectBarang', [BarangController::class, 'getBarang'])->name('select.Barang');
    // route master vendor
    Route::resource('/master/vendor', VendorController::class);

    // route master customer
    Route::resource('/master/customer', CustomerController::class);

    // route master kategori
    Route::resource('/master/kategori', KategoriController::class);

    // route master satuan
    Route::resource('/master/satuan', SatuanController::class);

    // route gudang
    Route::resource('/gudang', GudangController::class);
    Route::get('/rak', [RakController::class, 'index']);
    Route::get('/rak/{id}', [RakController::class, 'view']);

    // route barang keluar
    Route::resource('/barangkeluar', BarangKeluarController::class);
    // Route::get('selectGudang', [GudangController::class, 'getGudang'])->name('select.Gudang');

    Route::resource('/barangmasuk', BarangMasukController::class);
});
Route::get('lihat/rak/{id}', [RakController::class, 'lihat']);
