<?php

use App\Models\Hutang;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/dashboard-general-dashboard');

// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    //hitung jumlah user jika ada nama user yang sama maka akan dihitung 1
    $jumlah_user = Hutang::select('nama_pelanggan')->distinct()->count('nama_pelanggan');

    $data_hutang = Hutang::get()->groupBy('nama_pelanggan')->map(function ($item) {
        return $item->sum('jumlah_hutang');
    });

    $data = [
        'type_menu' => 'dashboard',
        'data_hutang' => $data_hutang,
        'jumlah_user' => $jumlah_user
    ];
    return view('pages.dashboard-general-dashboard', $data)->with('jumlah_user', $jumlah_user);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});

//data hutang
Route::get('/data-hutang', [App\Http\Controllers\HutangController::class, 'index'])->name('data-hutang');
Route::get('/tambah-data-hutang', [App\Http\Controllers\HutangController::class, 'tambah']);
Route::post('/simpan-hutang', [App\Http\Controllers\HutangController::class, 'simpan']);
Route::delete('/hapus-hutang/{id}', [App\Http\Controllers\HutangController::class, 'destroy']);

//data pembayaran
Route::get('/data-pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('data-pembayaran');
Route::get('/detail-pembayaran/{nama}', [App\Http\Controllers\PembayaranController::class, 'detail']);
Route::get('/bayar-hutang/{nama}', [App\Http\Controllers\PembayaranController::class, 'bayarHutang'])->name("bayar-hutang");
Route::post('/simpan-pembayaran', [App\Http\Controllers\PembayaranController::class, 'simpan']);
