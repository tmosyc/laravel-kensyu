<?php declare(strict_types=1);

namespace App\Repo;

use App\Models\Article;

class ArticleRepo
{
    public static function detailArticle($article_id)
    {
        $detail_article = Article::where('article_id',$article_id)->first();
        return $detail_article;
    }
    public static function articleIdList()
    {
        $article_id_list = Article::select('article_id')->get();
        return $article_id_list;
    }
}
