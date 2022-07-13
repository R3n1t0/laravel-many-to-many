@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea un nuovo Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.post.store')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titotlo</label>
            <input value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" >
            @error('title')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
            @error('content')
                <p>{{$message}}</p>
            @enderror
        </div>

        <select class="form-select" aria-label="Default select example" name="category_id">
            <option >Scegli una categoria</option>
            @foreach ($categories as $category)
                <option @if ($category->id == old('category_id'))
                    selected
                @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <div class="my-3">
            @foreach ($tags as $tag)
                <input
                        type="checkbox"
                        name="tags[]"
                        id="tag{{$loop->iteration}}"
                        value="{{$tag->id}}"
                        @if (in_array($tag->id, old('ingredients', [])))
                            checked
                        @endif>
                <label for="ingredient{{$loop->iteration}}" >{{$tag->name}}</label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary d-block mt-3">Submit</button>
      </form>

</div>
@endsection
