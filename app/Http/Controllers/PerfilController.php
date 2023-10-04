<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() 
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // Validacion
        // Force username to be slug
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'max:60', 'min:3', 'unique:users,username,' . auth()->user()->id, 'not_in:perfil,twitter,puto,boludo']
        ]);

        // Imagen
        if ($request->imagen) {
            // Info del input
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
    
            // Corto la imágen con Interntation Image
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(800, 800);
    
            // Creo el path
            $imagenPath = public_path('perfiles/' . $nombreImagen);

            // Guardo la imagen en el servidor
            $imagenServidor->save($imagenPath);
        }

        // Guardo los datos
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // Redirecciono
        return redirect()->route('posts.index', $usuario->username);
     }
}
