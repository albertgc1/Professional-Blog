@extends('layout')

@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

    <div class="box w-full md:w-1/2 mx-auto bg-white mb-4 pb-6 shadow-md rounded-sm">
        @if ($post->photos->count() > 0) 
            <div class="w-full h-56 flex overflow-auto">
                @foreach ($post->photos as $photo)
                <img class="h-full w-auto" src="{{ url($photo->photo) }}" />
                @endforeach
            </div>
        @endif
        <div class="pl-6 flex justify-between pt-6">
            <span class="tracking-widest">{{ $post->published_at->format('M d') }}</span>
            <span class="bg-green-500 w-1/6 shadow-md text-center text-gray-300 rounded-l-lg">{{ $post->category->name }}</span>
        </div>
        <div class="pr-6 pl-6">
            <div class="my-4">
                <h2 class="text-4xl tracking-tight">{{ $post->title }}</h2>
            </div>
            <hr>
            <div class="my-4">
                <p class="leading-relaxed mb-4">{{ $post->body }}</p>
                <div class="flex justify-between">
                    <div></div>
                    <div>
                        @foreach ($post->tags as $tag)
                            <span class="text-gray-600">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection