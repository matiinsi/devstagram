@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <section class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('storage') . '/' . $post->imagen }}" alt="{{$post->titulo}}">

            <div class="p-3 flex items-center gap-4">
                
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm font-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input 
                            type="submit" 
                            value="Eliminar publicación"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase"
                        >
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5 pt-0">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">
                    Agregar un nuevo comentario
                </p>
                @if (session('success'))
                    <div class="bg-green-500 p-3 rounded-lg text-white text-center mb-3">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('comentario.store', ['user' => $user, 'post' => $post])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Comentario
                        </label>
                        <textarea 
                            name="comentario" 
                            id="comentario" 
                            class="border-2 p-3 w-full rounded-lg focus:outline-none focus:border-gray-400 @error('comentario') border-red-500 @enderror"
                            placeholder="Comentario del post"
                        ></textarea>
                            @error('comentario')
                                <span class="text-xs text-red-500 p-2">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-5">
                        <input 
                            type="submit" 
                            value="Comentar" 
                            class="bg-blue-500 w-full hover:bg-blue-600 text-white font-bold p-3 rounded-lg focus:outline-none focus:shadow-outline uppercase">
                    </div>
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario )
                            <div class="border-b p-5 border-gray-300">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>     
                            </div> 
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aún</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection