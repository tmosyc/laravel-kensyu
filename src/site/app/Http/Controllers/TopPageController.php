<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller
{
    public static function topPageView()
    {
        $article_list = self::postAll();
        return view('posts',['articles'=>$article_list]);
    }

    public static function postAll()
    {
        return Article::all();
    }
}
