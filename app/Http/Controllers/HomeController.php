<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!empty($user->admin) && $user->admin) {
            return view('admin.index');
        }

        return view('home.index');
    }
}
