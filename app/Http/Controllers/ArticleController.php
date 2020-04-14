<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // response without cache
        // $articles = Article::all();

        // response with cache
        $articles = \Cache::remember('articles', 60, function() {
            return Article::all();
        });

        return response()->json($articles);
    }
}
