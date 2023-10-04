<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Force username to be slug
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validations
        $this->validate($request, [
            'name' => ['required', 'max:60', 'min:3'],
            'username' => ['required', 'max:60', 'min:3', 'unique:users'],
            'email' => ['email', 'required', 'max:60', 'min:3', 'unique:users'],
            'password' => ['confirmed', 'required', 'max:8', 'min:6']
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Sign in
        auth()->attempt($request->only('email', 'password'));

        // Otra forma
/*         auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */

        return redirect()->route('posts.index', auth()->user());
    }
}
