<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PageController extends Controller
{
    public function about(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $tags = ['обучение', 'программирование', 'php', 'oop'];
        return view('page.about', ['tags' => $tags]);
    }
}
