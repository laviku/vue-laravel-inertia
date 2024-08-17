<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticlesController extends Controller
{
    public function index() 
    {
        $articles = Articles::all();
        return Inertia::render('Articles/Index', ['articles' => $articles]);
    }

    public function create() 
    {
        return Inertia::render('Articles/Create');
    }

    public function store(Request $request) 
    { 
        $article = new Articles($request->all());
        $article->save();
        return redirect()->route('articles.index');
        // TODO: form validation
    }

    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
        // TODO: flash message
    }
}
