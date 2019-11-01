<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index () {
        return view ('article.index', [
            'articles' => Article::paginate(3)
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
        return view ('article.create');
    }

    public function store () {
        // persiste the new resource

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        
        $article->save();

        return redirect('/articles');
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
