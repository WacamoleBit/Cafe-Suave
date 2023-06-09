<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteAccountController extends Controller
{
    public function show()
    {
        return view('user.destroy');
    }

    public function destroy(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->submitbutton == 'confirm') {
            $user->delete();

            return redirect()->to('/home')->with("Success", "Cuenta borrada con éxito");
        }

        return redirect()->to('/user');
    }
}
