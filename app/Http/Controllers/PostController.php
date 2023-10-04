<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index(User $user) {

        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    // Agregar post
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'imagen' => 'required'
        ]);

/*         Post::create([
            'titulo' => $request->title,
            'descripcion' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]); */

        $request->user()->posts()->create([
            'titulo' => $request->title,
            'descripcion' => $request->description,
            'imagen' => $request->imagen
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    // Mostrar post
    public function show( User $user, Post $post ) {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    // Eliminar post
    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();

        // Elimino imagen
        $imagen_path = public_path('storage/' . $post->imagen);

        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
