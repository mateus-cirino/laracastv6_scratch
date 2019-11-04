<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index () {
        return view ('article.index', [
            'articles' => Article::paginate(3)
        ]);
    }
    
    public function show (Article $article) {
        // show a view to determinate article
        return view ('article.show', [
            'article' => $article
        ]);
    }

    public function create () {
        // show a view to create a new resource
        return view ('article.create');
    }

    public function store (ArticleRequest $request) {
        // persiste the new resource

        $article = new Article();

        $article->title = $request('title');
        $article->excerpt = $request('excerpt');
        $article->body = $request('body');
        
        $article->save();

        return redirect('/articles');
    }

    public function edit (Article $article) {
        // show a view to edit an existing resource
        return view ('article.edit',[
        'article' => $article]);
    }

    public function update () {
        // persiste the edit on the resource
        $article = Article::find(request('id'));

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        
        $article->save();

        return redirect('/articles/' . $article->id);
        
    }

    public function destroy (Article $article) {
        // delete the resource
        $article->delete();
    
        return redirect('/articles');
    }
}
