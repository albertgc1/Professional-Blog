@extends('layout')

@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

    <div class="box grid grid-cols-2 mx-16 bg-white mb-4 pb-6 shadow-md rounded-sm">
      <div class="w-full grid grid-cols-2">
        @if ($post->photos->count() > 0)
            @foreach ($post->photos as $photo)
                <img class="w-full h-auto mb-0" src="{{ url($photo->photo) }}" />
            @endforeach
        @endif
      </div>
      <div class="">
        <div class="pl-6 flex justify-between pt-6">
            <span class="tracking-widest">{{ optional($post->published_at)->format('M d') }}</span>
            @if ($post->category)
                <span class="bg-green-500 w-1/6 shadow-md text-center text-gray-300 rounded-l-lg">{{ $post->category->name }}</span>
            @endif
        </div>
        <div class="pr-6 pl-6">
            <div class="my-4">
                <h2 class="text-4xl tracking-tight">{{ $post->title }}</h2>
            </div>
            <hr>
            <div class="my-4">
                <p class="leading-relaxed mb-4">{!! $post->body !!}</p>
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
    </div>

@endsection