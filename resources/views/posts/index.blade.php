<ul>
    @foreach ($posts as $post)
        <li>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->excerpt }}</p>
            <small>{{ $post->published_at->format('M d') }}</small>
        </li>
    @endforeach
</ul>