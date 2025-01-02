<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Models\Transaksi;
use App\Models\User;
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

Route::get('/', function () {
    if(session()->has('user')){
        $transaksi = Transaksi::where('userID', session('user')->userID)->get();
        $balance = $transaksi->sum('jumlah');
        return view('home.dashboard', compact('transaksi','balance'));
    } else {
        return view('home.login');
    }
});

Route::get('/login', function () {

    if(session('user')){
        return view('home.dashboard');
    } else {
        return view('home.login');
    }
});
Route::get('/daftar', function () {
    if(session('user')){
        return view('home.dashboard');
    } else {
        return view('home.daftar');
    }
});
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});
Route::post('/loginaction', [TransaksiController::class, 'login']);
Route::post('/registeraction', [TransaksiController::class, 'daftar']);
Route::post('/addtransaksi', [TransaksiController::class, 'tambahtransaksi']);

