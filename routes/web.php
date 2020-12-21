<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);
Route::namespace('App\Http\Controllers')->middleware(['auth','verified'])->group(function(){
    Route::resource('/home','HomeController',['except'=>['create','store','edit','update','destroy']]);
    Route::resource('/articles','Article\ArticleController');
    Route::put('/articles/{articleId}/reduceStock','Article\ArticleController@reduceStock')->name('articles.reduceStock');
});


