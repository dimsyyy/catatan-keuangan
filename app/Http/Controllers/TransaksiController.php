<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class TransaksiController extends Controller
{
    //
    public function login(Request $request)
    {
        $data = User::where('email', $request->email)->where('password', $request->password)->first();
        if($data){
            return redirect('/home');
        } else {
            return redirect()->back()->with('err','Email atau Password Salah');
        }
    }
}