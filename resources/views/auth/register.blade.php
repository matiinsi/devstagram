@extends('layouts.app')

@section('titulo', 'Registro')

@section('contenido')

<div class="md:flex md:justify-center md:gap-4 md:items-center">
    <div class="md:w-6/12">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Registro" class="rounded">
    </div>
    <div class="md:w-4/12 bg-white p-5 rounded-md shadow-lg">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="md:flex md:gap-3">
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                        placeholder="Tu nombre"
                        value="{{ old('name') }}"
                        >
                        @error('name')
                            <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                        placeholder="Tu usuario"
                        value="{{ old('username') }}"
                        >
                        @error('username')
                            <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                        @enderror
                </div>



            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
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
                    class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                    placeholder="Tu contraseña"
                    >
                    @error('password')
                        <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                    @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir Contraseña
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400" 
                    placeholder="Repite tu contraseña"
                    >
                    @error('password_confirmation')
                        <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                    @enderror
            </div>

        
            <div class="mb-5">
                <input 
                    type="submit" 
                    value="Registrarse" 
                    class="bg-blue-500 w-full hover:bg-blue-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase">
            </div>
        </form>
    </div>
</div>

@endsection