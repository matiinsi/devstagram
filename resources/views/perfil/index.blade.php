@extends('layouts.app')

@section('titulo')
    Editando Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 shadow p-5 bg-white">
            <form action="{{ route('perfil.store') }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Tu usuario
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                        placeholder="Tu usuario"
                        value="{{ auth()->user()->username }}"
                    >
                    @error('username')
                        <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen" 
                        class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400"
                        accept=".jpg, .jpeg, .png"
                    >
                </div>

                <div class="mb-5">
                    <input 
                        type="submit" 
                        value="Guardar cambios" 
                        class="bg-blue-500 w-full hover:bg-blue-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase"
                    >
                </div>
            </form>
        </div>
    </div>
@endsection