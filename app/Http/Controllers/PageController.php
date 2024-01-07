<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lettertypes;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function dashboard()
    {
       if (Auth::user()->role === 'staff') {
        $staffCount = User::where('role', 'staff')->count();
        $guruCount = User::where('role', 'guru')->count();
        // $lettertypes = Lettertypes::count();
        $letters = Letter::count();
        return view('admin.index', compact('staffCount', 'guruCount','letters'));
    } elseif (Auth::user()->role === 'guru') {
        return view('guru.index');
    } else {
        return view('home.index');
    }
    }

    // public function home(){
    //     return view('home.index');
    // }
}
