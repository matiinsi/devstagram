<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    // Crear comentario
    public function store(Request $request, User $user, Post $post)
    {
        // Validar
        $request->validate([
            'comentario' => 'required|max:255'
        ]);

        // Crear comentario
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // Redireccionar
        return back()->with('success', 'Comentario creado con éxito');
    }
}
