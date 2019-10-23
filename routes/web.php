<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dados', function () {
    $name = request('name');
    return view('dados', [
       'name' => $name
    ]);
});

Route::get('post/{post}', function ($post) {
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
});

