@extends('layouts.main')

@section('container')
{{-- <h1 class="mb-5">Post Category : {{ $category }}</h1> --}}

@foreach ($posts as $post)
<article>
    <h1>
        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
    </h1>
    <p>{{ $post->excerpt }}</p>

</article>
    
@endforeach    
@endsection
