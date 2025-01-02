<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
Carbon::setLocale('id');

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function login(Request $request)
    {
        $data = User::where('email', $request->email)->where('password', $request->password)->first();
        if($data){
            session()->put('user', $data    );
            return redirect('/');
        } else {
            return redirect()->back()->with('err','Email atau Password Salah');
        }
    }
    public function daftar(Request $request)
    {
        $data = new User();
        $data->nama = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();

        return redirect('/login')->with('success','Data Berhasil Disimpan');
    }
    public function tambahtransaksi(Request $request)
    {
        if($request->tipe == 'pemasukan'){
            $data = new Transaksi();
            $data->userID = session('user')->userID;
            $data->tipe = $request->tipe;
            $data->jumlah = $request->jumlah;
            $data->keterangan = $request->keterangan;
            $data->tanggal = Carbon::now();
            $data->save();
            return redirect('/')->with('success','Transaksi Berhasil Disimpan');
        }else{
            $data = new Transaksi();
            $data->userID = session('user')->userID;
            $data->tipe = $request->tipe;
            $data->jumlah = -$request->jumlah;
            $data->keterangan = $request->keterangan;
            $data->tanggal = Carbon::now();
            $data->save();
            return redirect('/')->with('success','Transaksi Berhasil Disimpan');
        }

    }
}
