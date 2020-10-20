@extends('layout')

@section('content')
    <a href="{{ route('login') }}">Login</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2 class="text-lg">{{ $post->title }} | {{ $post->category->name }}</h2>
                <p>{{ $post->excerpt }}</p>
                <small>{{ $post->published_at->format('M d') }}</small><br>
                @foreach ($post->tags as $tag)
                    #<span>{{ $tag->name }}</span>
                @endforeach
                <a href="{{ route('posts.show', $post) }}">Leer todo</a>
            </li>
        @endforeach
    </ul>

@endsection
