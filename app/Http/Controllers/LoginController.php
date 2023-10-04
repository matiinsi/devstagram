<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Index
    public function index() {
        return view('auth.login');
    }

    // Store
    public function store(Request $request) {
        $this->validate($request, [
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        // Sign the user in
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Datos incorrectos');
        }

        return redirect()->route('posts.index', auth()->user());
    }
}
