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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'everything works!';
});

Route::get('/ola/{nome}', function ($nome) {
    return 'Olá '.$nome;
});

Route::get('/regras/{nome}/{n}', function ($nome, $n) {
    for($i=0; $i < $n; $i++)
        echo $nome.'<br>';
})->where('nome', '[A-Za-z]+')
  ->where('n', '[0-9]+');


Route::prefix('/app')->group(function () {
    Route::get('/', function () {
        return view('app');
    })->name('app');

    Route::get('/config', function () {
        return view('config');
    })->name('app.config');

    Route::get('/user', function () {
        return view('user');
    })->name('app.user');
});

Route::get('/produtos', function () {
    return 'meus produtos';
})->name('meusprodutos');

Route::redirect('todosprodutos', 'produtos', 301);