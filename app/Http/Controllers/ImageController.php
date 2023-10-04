<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    //
    public function store(Request $request) {

        $file = $request->file('file');

        $nombreImagen = Str::uuid() . '.' . $file->extension();

        // Corto la imágen con Interntation Image
        $imagenServidor = Image::make($file);
        $imagenServidor->fit(800, 800);

        // Creo el path
        $imagenPath = public_path('storage/' . $nombreImagen);

        // Guardo la imagen en el servidor
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
