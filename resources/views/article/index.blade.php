@extends('layouts.app')

@if (Session::has('status'))
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
@endif

@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href={{route('articles.show', ['id' => $article->id])}}>{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <a href={{route('articles.edit', ['id' => $article->id])}}>Редактировать</a>
    @endforeach
    {{$articles->links()}}
@endsection
