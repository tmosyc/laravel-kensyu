<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repo\ArticleRepo;
use Illuminate\Support\Facades\DB;

class DetailController
{
    public static function detailView($article_id)
    {
        $article_id_list = ArticleRepo::articleIdList();
        if ($article_id_list->contains('article_id', $article_id)) {
            $detail_article = ArticleRepo::detailArticle($article_id);
            return view('detail',['detail_info'=>$detail_article]);
        } else {
            return view('notfound');
        }

    }
}
