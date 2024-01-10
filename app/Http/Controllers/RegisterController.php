<?php

namespace App\Http\Controllers;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return view('auth.register');
    }
}
