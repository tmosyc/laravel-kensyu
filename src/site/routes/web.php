<?php

use App\Http\Controllers\PostArticleController;
use App\Http\Controllers\TopPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/toshiki',function () {
    return '<h1>hello toshiki</h1>';
});

Route::get('/login',function () {
    return view('login');
});

Route::get('/register',function () {
    return view('register');
});

Route::get('/posts',[TopPageController::class, 'topPageView']);

Route::post('/posts',[PostArticleController::class, 'articleInsert']);
