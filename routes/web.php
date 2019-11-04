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
Route::post('/articles', 'ArticlesController@store');

Route::put('/articles/{article}', 'ArticlesController@update');

Route::delete('/articles/{article}', 'ArticlesController@destroy');

Route::get('/articles/{article}/edit', 'ArticlesController@edit');

Route::get('/articles/create', 'ArticlesController@create');

Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/articles', 'ArticlesController@index');