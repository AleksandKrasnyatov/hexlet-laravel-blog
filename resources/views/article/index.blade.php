@extends('layouts.app')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href={{route('articles.show', [$article])}}>{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <a href={{route('articles.edit', [$article])}}>Редактировать</a>
        <a href={{route('articles.destroy', [$article])}} data-method="delete" rel="nofollow">Удалить</a>

    @endforeach
    {{$articles->links()}}
@endsection
