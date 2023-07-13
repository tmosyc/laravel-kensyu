<?php declare(strict_types=1);

namespace App\Repo;

use App\Models\Article;

class DetailArticleRepo
{
    public static function detailArticle($article_id)
    {
        $detail_article = Article::where('article_id',$article_id)->first();
        return $detail_article;
    }
}
