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
}
