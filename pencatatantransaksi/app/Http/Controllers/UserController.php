<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Redirect berdasarkan role user
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('toko.dashboard');
    }
}
