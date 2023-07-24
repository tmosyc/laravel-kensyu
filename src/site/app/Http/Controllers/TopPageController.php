<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Repo\ArticleRepo;
use App\Repo\ArticleTagRepo;
use Illuminate\Http\Request;
use App\Models\Article;
use App\DTO\ArticleDTO;
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public static function topPageView()
    {
        $article_list = self::displayTopPageInfo();
        $tag_list = ArticleTagRepo::getByTagName();
        return view('posts',['articles'=>$article_list,'tag_list'=>$tag_list]);
    }

    /**
     * @return ArticleRepo[]
     */
    public static function displayTopPageInfo()
    {
        $select_article = DB::table('articles')->join('users','articles.user_id','=','users.id')->get();
        $articles = [];
        foreach ($select_article as $article){

            $article_dto = new ArticleDTO($article->article_id,
                $article->title,
                $article->content,
                $article->thumbnail_image_id,
                $article->user_id,
                $article->name);
            $articles[] = $article_dto;
        }
        return $articles;
    }
}
