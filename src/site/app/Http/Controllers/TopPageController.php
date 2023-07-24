<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repo\ArticleTagRepo;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public static function topPageView()
    {
        $article_list = self::postAll();
        $tag_list = ArticleTagRepo::getByTagName();
        return view('posts',['articles'=>$article_list,'tag_list'=>$tag_list]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function postAll()
    {
        return Article::all();
    }
}
