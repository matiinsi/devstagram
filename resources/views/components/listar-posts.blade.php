@if ($posts->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}">
            <img src=" {{ asset('storage') . '/'. $post->imagen }}" alt="{{ $post->titulo }}">
        </a>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
@else
    <p class="text-center text-gray-600 uppercase text-sm font-bold">No hay publicaciones</p>
@endif