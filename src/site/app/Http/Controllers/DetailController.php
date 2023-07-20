<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repo\ArticleRepo;
use Illuminate\Support\Facades\DB;

class DetailController
{
    public static function detailView(int $article_id)
    {
        $article_id_list = ArticleRepo::articleIdList();
        if ($article_id_list->contains('article_id', $article_id)) {
            $detail_article = ArticleRepo::detailArticle($article_id);
            $detail_article_images = ArticleRepo::getByDetailImages($article_id);
            return view('detail',['detail_info'=>$detail_article,'detail_images'=>$detail_article_images]);
        } else {
            return view('notfound');
        }
    }
}
