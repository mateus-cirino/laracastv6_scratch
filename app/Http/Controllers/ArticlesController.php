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
        Article::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' =>   $request->body
        ]);

        return redirect( route('article.index') );
    }

    public function edit (Article $article) {
        // show a view to edit an existing resource
        return view ('article.edit',[
        'article' => $article]);
    }

    public function update (ArticleRequest $request, Article $article) {
        // persiste the edit on the resource
        $article->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' =>   $request->body
        ]);

        return redirect( $article->path() );
        
    }

    public function destroy (Article $article) {
        // delete the resource
        $article->delete();
    
        return redirect( route('article.index') );
    }
}
