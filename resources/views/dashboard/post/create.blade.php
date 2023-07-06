@extends('dashboard.layout')

@section('content')
    <h1>Crear post</h1>
    @include('dashboard.fragment.form-errors')

    <form action="{{ route('post.store') }}" method="post">
        @csrf

        <label>Título</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

        <label>Categoría</label>
        <select name="category_id">
            @foreach ($categories as $title => $id)
                <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }} value="{{ $id }}">
                    {{ $title }}
                </option>
            @endforeach
        </select>

        <label>Publicado</label>
        <select name="posted">
            <option {{ old('posted', $post->posted) == 'no' ? 'selected' : '' }} value="no">No</option>
            <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value="yes">Sí</option>
        </select>

        <label>Descripción</label>
        <input type="text" name="description" value="{{ old('description', $post->description) }}">

        <label>Contenido</label>
        <textarea name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>

        <button type="submit">Guardar</button>
    </form>
@endsection
