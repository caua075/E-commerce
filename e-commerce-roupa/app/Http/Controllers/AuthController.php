<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register
    public function showRegister()
    {
        return view('auth.register');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('msg', 'Cadastro realizado com sucesso!');
    }

    //Login
    public function showLogin()
    {
        return view('auth.login');
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route(Auth::user()->is_admin ? 'admin.dashboard' : 'home');
        }

        return back()->with('msgError','Usuário ou senha incorretos!');
    }

    //Logout
    public function Logout()
    {
        Auth::logout();
        return redirect('/' );
    }
}
