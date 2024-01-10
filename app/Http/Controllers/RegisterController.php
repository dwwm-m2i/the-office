<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = Str::before($request->email, '@');
        $user->password = $request->password;
        $user->save();

        Auth::login($user);

        return redirect('/salles');
    }
}
