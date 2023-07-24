<?php

namespace App\Http\Controllers;

use App\DTO\ArticleDTO;
use App\Repo\ArticleRepo;

class DeleteController
{
    public static function deleteArticle($article_id)
    {
        ArticleRepo::detailArticle($article_id);
        return ('/posts');
    }
}
