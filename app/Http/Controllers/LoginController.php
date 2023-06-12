<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function show()
    {
        if (Auth::check()) {
            return redirect()->to('/home');
        }

        return view('auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()->to('/home');
    }
}
