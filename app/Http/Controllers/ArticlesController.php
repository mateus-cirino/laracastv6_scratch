<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index () {
        return view ('article.index', [
            'articles' => Article::paginate()
        ]);
    }
    
    public function show ($id) {
        $article = Article::find($id);

        return view ('article.show', [
            'article' => $article
        ]);
    }
}
