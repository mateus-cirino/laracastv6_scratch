<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show ($post) {
        $posts = [
            'my-first-post' => 'Hello, is the my first post',
            'my-second-post' => 'Good, is the my second post'
        ];
        if (! array_key_exists($post, $posts)) {
            abort(404, 'Desculpe, esta pagina não foi encontrada');
        }
        return view('post', [
            'post' => $posts[$post]
        ]);
    }
}
