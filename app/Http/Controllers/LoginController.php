<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function auth(Request $request)
    {
        // dd($request->all());

        $credentials = $request->validate([
            'email'=> "required|email",
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials) ) {
            $request->session()->regenerate();

            $role  = auth()->user()->role;

            // direct sesuai role
            if($role == "admin") {
                return redirect()->intended('/');
            }

            // return redirect()->intended('dashboard');
        } else {
            return back()->with(['error' => 'Email atau Password Salah!']);
        }
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
