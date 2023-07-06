@extends('dashboard.layout')

@section('content')
    <h1>Ver post</h1>
    @include('dashboard.fragment.form-errors')

    <label>Título</label>
    <input readonly type="text" value="{{ $post->title }}">

    <label>Slug</label>
    <input readonly type="text" value="{{ $post->slug }}">

    <label>Categoría</label>
    @foreach ($categories as $title => $id)
        @if ($post->category_id == $id)
            <input readonly type="text" value="{{ $title }}">
        @endif
    @endforeach

    <label>Publicado</label>
    <input readonly type="text" value="{{ $post->posted }}">

    <label>Descripción</label>
    <input readonly type="text" value="{{ $post->description }}">

    <label>Contenido</label>
    <textarea readonly cols="30" rows="10">{{ $post->content }}</textarea>

    <a href="{{ route('post.index') }}">Volver al listado</a>
@endsection
