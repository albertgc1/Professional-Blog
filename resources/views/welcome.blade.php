@extends('layout')

@section('content')
    
    @foreach ($posts as $post)
        <div class="box w-full md:w-1/2 mx-auto bg-white mb-4 py-4 pl-6 shadow-md rounded-sm">
            <div class="flex justify-between">
                <span class="tracking-widest">{{ $post->published_at->format('M d') }}</span>
                <span class="bg-green-500 w-1/6 shadow-md text-center text-gray-300 rounded-l-lg">{{ $post->category->name }}</span>
            </div>
            <div class="pr-6">
                <div class="my-4">
                    <h2 class="text-4xl tracking-tight">{{ $post->title }}</h2>
                </div>
                <hr>
                <div class="my-4">
                    <p class="leading-relaxed mb-4">{{ $post->excerpt }}</p>
                    <div class="flex justify-between">
                        <div class="">
                            <a class="text-green-500 uppercase font-semibold" href="{{ route('posts.show', $post) }}">Leer todo</a>
                        </div>
                        <div>
                            @foreach ($post->tags as $tag)
                                <span class="text-gray-600">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="w-full md:w-1/2 mx-auto">
        {{ $posts->links() }}
    </div>

@endsection
