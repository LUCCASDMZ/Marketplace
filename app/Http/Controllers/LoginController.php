<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo email e obrigatorio!',
            'email.email' => 'O email não é valido',
            'password.required' => 'O campo senha e obrigatorio!' ,
        ]);

    if(Auth::attempt($credenciais)) {
        $request->session()->regenerate();
        return redirect()->intended('/');
    }else{
        return redirect()->back()->with('erro', 'Usuario ou senha invalido');
    }
    }
}
