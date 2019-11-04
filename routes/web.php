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

use App\Http\Controllers\ArticlesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dados', function () {
    $name = request('name');
    return view('dados', [
       'name' => $name
    ]);
});

Route::get('posts/{post}', 'PostController@show');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()            
    ]);
});
Route::put('/articles/{articleid}', 'ArticlesController@update');

Route::get('/articles/{articleid}/edit', 'ArticlesController@edit');

Route::get('/articles', 'ArticlesController@index');

Route::post('/articles', 'ArticlesController@store');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/articles/{articleid}', 'ArticlesController@show');