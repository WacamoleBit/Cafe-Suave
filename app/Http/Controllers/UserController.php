<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('user.show', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln('update');
        $user = User::find(Auth::id());
        
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'string|required|email',
            'username' => 'string||required',
        ]);
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();

        return view('user.edit', ['user' => $user]);
    }

    public function edit()
    {
        $user = User::find(Auth::id());

        return view('user.edit', ['user' => $user]);
    }
}
