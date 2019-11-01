<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index () {
        return view ('article.index', [
            'articles' => Article::paginate(1)
        ]);
    }
    
    public function show ($id) {
        $article = Article::find($id);

        return view ('article.show', [
            'article' => $article
        ]);
    }

    public function create () {
        // show a view to create a new resource

    }

    public function store () {
        // persiste the new resource

    }

    public function edit () {
        // show a view to edit an existing resource

    }

    public function update () {
        // persiste the edit on the resource

    }

    public function destroy () {
        // delete the resource
    }
}
