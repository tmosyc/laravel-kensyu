<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\DB;

class DetailController
{
    public static function detailView($number)
    {
        $detail_article = self::detail_article_repo($number);
        return view('detail',['detail_info'=>$detail_article]);
    }

    private static function detail_article_repo($number)
    {
        $detail_article = Article::where('article_id',$number)->first();
        return $detail_article;

    }
}
