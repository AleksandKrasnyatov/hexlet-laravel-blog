<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

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
}
