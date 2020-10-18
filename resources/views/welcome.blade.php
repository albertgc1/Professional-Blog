<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h2>{{ $post->title }} | {{ $post->category->name }}</h2>
                    <p>{{ $post->excerpt }}</p>
                    <small>{{ $post->published_at->format('M d') }}</small><br>
                    @foreach ($post->tags as $tag)
                        #<span>{{ $tag->name }}</span>
                    @endforeach
                    <a href="{{ route('posts.show', $post) }}">Leer todo</a>
                </li>
            @endforeach
        </ul>
    </body>
</html>
