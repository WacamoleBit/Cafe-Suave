<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        return redirect()->to('/login')->with("Éxito", "Se creó el usuario con éxito");;
    }

    public function show(): View
    {
        return view('auth.register');
    }
}
