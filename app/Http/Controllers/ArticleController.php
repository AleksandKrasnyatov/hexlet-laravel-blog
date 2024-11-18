<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|unique:articles',
            'body' => 'required|min:100',
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        $request->session()->flash('status', 'Статья была успешно добавлена!');

        return redirect()
            ->route('articles.index');
    }
}
