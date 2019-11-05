<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index () {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(3);
        }
        else {
            $articles = Article::all();
        }
        return view ('article.index', [
            'articles' => $articles
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
