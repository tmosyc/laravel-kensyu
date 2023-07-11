<?php
declare(strict_types=1);

namespace App\Http\Controllers;

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
        return view('posts',['articles'=>$article_list]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function postAll()
    {
        return Article::all();
    }
}
