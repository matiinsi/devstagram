@extends('layouts.app')

@section('titulo')
    Crear Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />    
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-6/12 px-10">
            <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-6/12 bg-white p-10 rounded-md shadow-lg">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="border- p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('name') border-red-500 @enderror" 
                        placeholder="Titulo del post"
                        value="{{ old('title') }}"
                        >
                        @error('title')
                            <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('description') border-red-500 @enderror"
                        placeholder="Descripción del post"
                    >{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                        @enderror
                </div>

                <div class="mb-5">
                    <input
                        type="hidden"
                        name="imagen"
                        id="imagen"
                        value="{{ old('imagen') }}"
                    />
                        @error('imagen')
                            <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                        @enderror
                    
                </div>
                <div class="mb-5">
                    <input 
                        type="submit" 
                        value="Crear Post" 
                        class="bg-blue-500 w-full hover:bg-blue-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase">
                </div>
            </form>
        </div>
    </div>
@endsection