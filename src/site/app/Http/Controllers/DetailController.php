<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repo\DetailArticleRepo;
use Illuminate\Support\Facades\DB;

class DetailController
{
    public static function detailView($article_id)
    {
        $detail_article = DetailArticleRepo::detailArticle($article_id);
        return view('detail',['detail_info'=>$detail_article]);
    }
}
