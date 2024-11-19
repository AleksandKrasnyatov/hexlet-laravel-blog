<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function show($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();

        $request->session()->flash('status', 'Статья была успешно добавлена!');

        return redirect()
            ->route('articles.index');
    }

    public function edit($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StorePostRequest $request, $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();

        $article->fill($data);
        $article->save();
        $request->session()->flash('status', 'Статья была успешно обновлена!');
        return redirect()->route('articles.index');
    }
}
