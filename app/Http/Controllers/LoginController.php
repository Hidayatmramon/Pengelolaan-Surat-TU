<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('error', "gagal login, silahkan cek dan coba lagi!");
        }
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
