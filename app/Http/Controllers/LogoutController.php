<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // index method
    public function index() {
        // logout the user
        auth()->logout();
        return redirect()->route('login');
    }
}
