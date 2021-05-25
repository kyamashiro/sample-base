<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//    Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');
    Route::resource('/articles', ArticleController::class)->except([
        'show',
    ]);

    // 利用者メッセージ画面
    Route::resource('/messages', MessageController::class);

    // 店舗柄メッセージ画面
    Route::prefix('shops')->group(function () {
        Route::resource('/messages', MessageController::class);
    });
});
