<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use App\Models\Article;
use App\Models\User;
use App\Repo\ArticleRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class DeleteController
{
    public static function deleteArticle(int $article_id)
    {
        $auth_user = ArticleRepo::auth_user($article_id);
        if (Session::get('email') === $auth_user->email) {
            ArticleRepo::deleteRepo($article_id);
        } else {
            abort(403);
        }
        return redirect('/posts');
    }
}
