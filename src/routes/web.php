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

Route::get('produtos', function(){ return view('outras.produtos');})->name('produtos');
Route::get('departamentos', function(){ return view('outras.departamentos');})->name('departamentos');
Route::get('produtos/{n1}/{n2}', 'MeuControlador@multi');
Route::get('opcoes/{opc?}', function($opc=null){
    return view('outras.opcoes', compact(['opc']));
})->name('opcoes');

Route::resource('clientes', 'ClienteController');

Route::get('bootstrap', function(){
    return view('outras.exemplo');
})->name('bootstrap');

