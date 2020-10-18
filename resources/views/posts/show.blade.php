@extends('layout')

@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')

    <h1>{{ $post->title }} | {{ $post->category->name }}</h1>
    <hr>
    <p>{{ $post->excerpt }}</p>
    <p>{{ $post->body }}</p>
    <small>{{ $post->published_at->format('M d') }}</small><br>
    @foreach ($post->tags as $tag)
        #<span>{{ $tag->name }}</span>
    @endforeach

@endsection