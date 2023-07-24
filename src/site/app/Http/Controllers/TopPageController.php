<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
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
     * @return array
     */
    public static function displayTopPageInfo()
    {
        $select_article = Article::all();
        $articles = [];
        foreach ($select_article as $article){
            $user = self::getByUsername($article->user_id);

            $article_dto = new ArticleDTO($article->article_id,
                $article->title,
                $article->content,
                $article->thumbnail_image_id,
                $article->user_id,
                $user->name);
            $articles[] = $article_dto;
        }
        return $articles;
    }

    public static function getByUsername($user_id)
    {
        $user = User::where('id',$user_id)->first();
        return $user;
    }
}
