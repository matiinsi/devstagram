@extends('layouts.app')

@section('titulo', 'Inicio de sesión')

@section('contenido')

<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-6/12">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Registro" class="rounded">
    </div>
    <div class="md:w-4/12 bg-white p-5 rounded-md shadow-lg">

        @if(session('status'))
            <p class="text-xs text-white p-2 bg-red-600 border-r-2">
                <span>{{ session('status') }}</span>
            </p>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="border-2 border-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                    placeholder="Tu email"
                    value="{{ old('email') }}"
                    >
                    @error('email')
                        <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                    @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="border-2 border-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                    placeholder="Tu contraseña"
                    >
                    @error('password')
                        <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                    @enderror
            </div>
        
            <div class="mb-5">
                <input 
                    type="submit" 
                    value="Iniciar sesión" 
                    class="bg-blue-500 w-full hover:bg-blue-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase">
            </div>
            <div class="mb-5">
                <input type="checkbox" name="remember" id="remember"> <label class="text-gray-500 text-sm" for="remember">Mantener la sesión abierta.</label>
            </div>
        </form>
    </div>
</div>

@endsection