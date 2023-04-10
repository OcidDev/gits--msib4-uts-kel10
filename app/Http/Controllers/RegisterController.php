<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function index()
    {
       return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($request->post('password') != $request->post('password_repeat')) {
            return back()->with(['error' => 'Konfirmasi Password Tidak Sama!'])->onlyInput('email', 'name');
        }

        $user  = new User;
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make( $request->post('password') );

        // Isi sesuai role yang dikehendaki
        $user->role = "other";
        $user->save();

        return back()->with(['success' => 'Registrasi Berhasil']);
    }
}
