@extends('dashboard.layout')

@section('content')
    <h1>Editar post</h1>
    @include('dashboard.fragment.form-errors')

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <label>Título</label>
        <input type="text" name="title" value="{{ $post->title }}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{ $post->slug }}">

        <label>Categoría</label>
        <select name="category_id">
            @foreach ($categories as $title => $id)
                <option {{ $post->category_id == $id ? 'selected' : '' }} value="{{ $id }}">{{ $title }}
                </option>
            @endforeach
        </select>

        <label>Publicado</label>
        <select name="posted">
            <option {{ $post->posted == 'no' ? 'selected' : '' }} value="no">No</option>
            <option {{ $post->posted == 'yes' ? 'selected' : '' }} value="yes">Sí</option>
        </select>

        <label>Descripción</label>
        <input type="text" name="description" value="{{ $post->description }}">

        <label>Contenido</label>
        <textarea name="content" cols="30" rows="10">{{ $post->content }}</textarea>

        <label for="image">Imagen</label>
        <input type="file" name="image">

        <button type="submit">Guardar</button>
    </form>
@endsection
