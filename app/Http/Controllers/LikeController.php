<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // Agregar like
    public function store(Request $request, Post $post) {
        // Inserto like

        $post->like()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    // update like
    public function destroy(Request $request, Post $post) {
        // Elimino like

        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
