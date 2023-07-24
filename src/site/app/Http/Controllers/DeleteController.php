<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use App\Repo\ArticleRepo;

class DeleteController
{
    public static function deleteArticle($article_id)
    {
        ArticleRepo::deleteRepo($article_id);
        return redirect('/posts');
    }
}
