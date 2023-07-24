<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostArticleController;
use App\Http\Controllers\PostRegisterController;
use App\Http\Controllers\RegisterPageController;
use App\Http\Controllers\TopPageController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::post('/posts',function() {
    $session_email = Session::get('email');
    return app()->call([PostArticleController::class, 'postTopPage'],compact('session_email'));
});

Route::get('/register',[RegisterPageController::class,'registerPageView']);

Route::post('/register',[PostRegisterController::class,'registerNextView']);

Route::get('/login', [LoginController::class, 'loginPageView']);

Route::post('/login', [LoginController::class, 'loginAuth']);

Route::get('/logout', [LogoutController::class,'logout']);

Route::get('/posts/{article_id}', function ($article_id) {
    $detail_view_controller = app()->make(DetailController::class);
    return $detail_view_controller->detailView($article_id);
});

Route::get('/posts/{article_id}/update', function ($article_id) {
    $update_controller = app()->make(UpdateController::class);
    return $update_controller->updateView($article_id);
});

Route::put('/posts/{article_id}/update', function ($article_id) {
    $session_id = Session::get('id');
    $update_controller = app()->make(UpdateController::class);
    return $update_controller->updateData($article_id, $session_id,request());
});

Route::delete('/posts/{article_id}/delete',function ($article_id) {
    $delete_controller = app()->make(DeleteController::class);
    return $delete_controller->deleteArticle($article_id);
});

