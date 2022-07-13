@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Titolo: {{ $post -> title}}</h3>

    @if ($post -> category)
        <h4>Categoria: {{ $post -> category->name }}</h4>
    @endif

    @forelse ($post->tags as $tag)
        <h4>Tags: {{ $tag -> name }}</h4>
    @empty
        -
    @endforelse

    <h5>Contenuto: </h5>
    <p>{{ $post -> content}}</p>
    <a class="btn btn-warning mx-1" href="{{ route('admin.post.edit', $post)}}">MODIFICA</a>
    <form class="d-inline" action="{{ route('admin.post.destroy', $post)}}" method="POST" onsubmit="return confirm('Confermi di cancellare il post: {{$post -> title}}')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">CANCELLA</button>
    </form>

    <a href="{{ route('admin.post.index')}}"><< Torna</a>

</div>
@endsection
