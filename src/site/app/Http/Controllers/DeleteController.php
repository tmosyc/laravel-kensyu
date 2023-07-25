<?php

namespace App\Http\Controllers;

use App\Repo\ArticleRepo;
use Illuminate\Support\Facades\Session;

class DeleteController
{
    public static function deleteArticle(int $session_id,int $article_id)
    {
        $auth_user = ArticleRepo::auth_user($session_id,$article_id);
        if ($auth_user) {
            ArticleRepo::deleteRepo($article_id);
        } else {
            abort(403);
        }
        return redirect('/posts');
    }
}
